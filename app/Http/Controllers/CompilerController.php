<?php

namespace App\Http\Controllers;

use App\Models\PretestSavedCodes;
use App\Models\Questions;
use App\Models\TemporaryPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompilerController extends Controller
{
    public function index()
    {
        return view('compiler');
    }

    public function runPretest(Request $request)
    {
        $request->validate([
            'question_id' => ['required', 'uuid'],
            'code' => ['required', 'string', 'max:10000'],
        ]);

        $code = $request->input('code');

        session([
            'pretest_coding_run' => [
                'question_id' => $request->question_id,
                'code_hash' => hash('sha256', $code),
            ],
        ]);

        $question = Questions::with('testCases')
            ->findOrFail($request->question_id);

        if ($question->question_type !== 'coding') {
            return response()->json([
                'success' => false,
                'output' => 'This question is not a coding question.',
            ], 422);
        }

        if ($question->testCases->isEmpty()) {
            return response()->json([
                'success' => false,
                'output' => 'No test cases have been configured for this question.',
            ], 422);
        }

        $results = [];
        $allPassed = true;

        foreach ($question->testCases as $testCase) {
            $id = uniqid('java_', true);

            $workDir = storage_path("app/compiler/$id");

            File::makeDirectory($workDir, 0755, true);

            File::put("$workDir/Main.java", $code);

            $scannerInput = trim($testCase->scanner_input ?? '');
            $scannerRequired = $scannerInput !== '';

            if (
                $scannerRequired &&
                !preg_match(
                    '/(?:new\s+(?:java\.util\.)?Scanner\s*\(|(?:java\.util\.)?Scanner\s+\w+)/',
                    $code
                )
            ) {
                $allPassed = false;

                $results[] = [
                    'test_case_id' => $testCase->id,
                    'test_case_order' => $testCase->test_case_order,
                    'passed' => false,
                    'output' => 'Scanner is required for this activity. Please use java.util.Scanner to receive the required input.',
                    'expected_output' => trim($testCase->expected_output),
                    'is_hidden' => $testCase->is_hidden,
                ];

                File::deleteDirectory($workDir);

                continue;
            }

            if ($scannerRequired) {
                File::put("$workDir/input.txt", $scannerInput);
            }

            $projectPath = str_replace('\\', '/', base_path());

            $runCommand = $scannerRequired
                ? 'timeout 5 java Main < input.txt'
                : 'timeout 5 java Main';

            $command = 'docker run --rm ' .
                '--network none ' .
                '--memory 256m ' .
                '--cpus 0.5 ' .
                '-v "' . $projectPath . '/storage/app/compiler/' . $id . ':/app" ' .
                'smart-elearning-java:21 ' .
                'sh -c "javac Main.java && ' . $runCommand . '"';

            $output = [];
            $exitCode = 0;

            exec($command . ' 2>&1', $output, $exitCode);

            $actualOutput = trim(implode("\n", $output));
            $expectedOutput = trim($testCase->expected_output);

            $comparisonExpected = $expectedOutput;

            if ($scannerRequired) {
                $expectedLines = preg_split(
                    '/\r\n|\r|\n/',
                    $comparisonExpected
                );

                $inputLines = preg_split(
                    '/\r\n|\r|\n/',
                    $scannerInput
                );

                foreach ($inputLines as $inputLine) {
                    $inputLine = trim($inputLine);

                    if ($inputLine === '') {
                        continue;
                    }

                    foreach ($expectedLines as $index => $line) {
                        if (
                            preg_match(
                                '/^(.*:\s*)' . preg_quote($inputLine, '/') . '\s*$/',
                                $line,
                                $matches
                            )
                        ) {
                            $expectedLines[$index] = rtrim($matches[1]);
                            break;
                        }
                    }
                }

                $comparisonExpected = implode(
                    "\n",
                    $expectedLines
                );
            }

            $comparisonExpected = preg_replace(
                '/\s+/',
                ' ',
                trim($comparisonExpected)
            );

            $actualComparison = preg_replace(
                '/\s+/',
                ' ',
                trim($actualOutput)
            );

            $passed = $exitCode === 0 &&
                $actualComparison === $comparisonExpected;

            if (!$passed) {
                $allPassed = false;
            }

            $results[] = [
                'test_case_id' => $testCase->id,
                'test_case_order' => $testCase->test_case_order,
                'passed' => $passed,
                'output' => $passed
                    ? $expectedOutput
                    : $actualOutput,
                'expected_output' => $expectedOutput,
                'is_hidden' => $testCase->is_hidden,
            ];

            File::deleteDirectory($workDir);
        }

        $passedTestCases = collect($results)
    ->where('passed', true)
    ->count();

$totalTestCases = count($results);

$partialPoints = $totalTestCases > 0
    ? floor(($passedTestCases / $totalTestCases) * $question->points)
    : 0;

$temporaryPoints = TemporaryPoints::firstOrNew([
    'user_id' => auth()->id(),
]);

$currentPoints = (int) ($temporaryPoints->points ?? 0);

$codingRuns = session('pretest_coding_points', []);

$previousPoints = (int) ($codingRuns[$question->id] ?? 0);

$temporaryPoints->points = max(
    0,
    $currentPoints - $previousPoints + $partialPoints
);

$temporaryPoints->save();

$codingRuns[$question->id] = $partialPoints;

session([
    'pretest_coding_points' => $codingRuns,
]);

return response()->json([
    'success' => $allPassed,
    'results' => $results,
    'passed_test_cases' => $passedTestCases,
    'total_test_cases' => $totalTestCases,
    'partial_points' => $partialPoints,
]);
    }

    public function save(Request $request)
    {
        $input = $request->validate([
            'code' => 'required|string'
        ]);

        $savedCode = PretestSavedCodes::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'question_id' => $request->question_id,
            ],
            [
                'code' => $input['code'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Code Saved Successfully!'
        ]);
    }
}