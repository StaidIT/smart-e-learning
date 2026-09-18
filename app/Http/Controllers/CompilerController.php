<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompilerController extends Controller
{
    public function index()
    {
        return view('compiler');
    }

    public function run(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:10000'],
        ]);

        $id = uniqid('java_', true);

        $workDir = storage_path("app/compiler/$id");

        File::makeDirectory($workDir, 0755, true);

        File::put("$workDir/Main.java", $request->input('code'));

        $projectPath = str_replace('\\', '/', base_path());

        $command = 'docker run --rm ' .
            '--network none ' .
            '--memory 256m ' .
            '--cpus 0.5 ' .
            '-v "' . $projectPath . '/storage/app/compiler/' . $id . ':/app" ' .
            'smart-elearning-java:21 ' .
            'sh -c "javac Main.java && timeout 5 java Main"';

        $output = [];
        $exitCode = 0;

        exec($command . ' 2>&1', $output, $exitCode);

        $result = implode("\n", $output);

        File::deleteDirectory($workDir);

        if ($exitCode === 0) {
            return response()->json([
                'success' => true,
                'output' => $result,
            ]);
        }

        return response()->json([
            'success' => false,
            'output' => $result,
        ]);
    }
}
