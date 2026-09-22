<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AnsweredQuestions;
use App\Models\PretestSavedCodes;
use App\Models\Questions;
use App\Models\TestCase;
use App\Models\UserPretest;
use Illuminate\Http\Request;

class CodePretestController extends Controller
{


    public function submitCodeAnswer(Request $request)
{
    $request->validate([
        'question_id' => ['required', 'uuid'],
        'subject_id' => ['required', 'uuid'],
        'module_id' => ['required', 'uuid'],
    ]);

    $question = Questions::where('id', $request->question_id)
        ->where('module_id', $request->module_id)
        ->where('question_type', 'coding')
        ->first();

    if (!$question) {
        return response()->json([
            'success' => false,
            'message' => 'Coding question not found.'
        ], 404);
    }

    $user_pretest = UserPretest::where('user_id', auth()->id())
        ->where('subject_id', $request->subject_id)
        ->where('module_id', $request->module_id)
        ->first();

    if (!$user_pretest) {
        return response()->json([
            'success' => false,
            'message' => 'Pretest record not found.'
        ], 404);
    }

    if ($user_pretest->status === 'passed') {
        return response()->json([
            'success' => false,
            'message' => 'This pretest has already been completed.'
        ], 403);
    }

    if ($user_pretest->status === 'locked') {
        return response()->json([
            'success' => false,
            'message' => 'This pretest is locked.'
        ], 403);
    }

    $codingRun = session('pretest_coding_run');

    if (
        !$codingRun ||
        ($codingRun['question_id'] ?? null) !== $question->id
    ) {
        return response()->json([
            'success' => false,
            'message' => 'Please run this code before submitting.'
        ], 422);
    }

    $savedCode = PretestSavedCodes::where('user_id', auth()->id())
        ->where('question_id', $question->id)
        ->value('code');

    if (!$savedCode) {
        return response()->json([
            'success' => false,
            'message' => 'No tested code was found.'
        ], 422);
    }

    if (
        !hash_equals(
            $codingRun['code_hash'],
            hash('sha256', $savedCode)
        )
    ) {
        return response()->json([
            'success' => false,
            'message' => 'The submitted code does not match the code that was tested. Please run the code again.'
        ], 422);
    }

    $testCases = TestCase::where('question_id', $question->id)->count();

    $codingPoints = session('pretest_coding_points', []);
    $partialPoints = (int) ($codingPoints[$question->id] ?? 0);

    if ($testCases <= 0) {
        return response()->json([
            'success' => false,
            'message' => 'This coding question has no test cases.'
        ], 422);
    }

    if ($partialPoints !== (int) $question->points) {
        return response()->json([
            'success' => false,
            'message' => 'All test cases must pass before submitting.'
        ], 422);
    }

    $alreadyAnswered = AnsweredQuestions::where('user_id', auth()->id())
        ->where('module_id', $request->module_id)
        ->where('question_id', $question->id)
        ->exists();

    if ($alreadyAnswered) {
        $answered_questions_ids = AnsweredQuestions::where('user_id', auth()->id())
            ->where('module_id', $request->module_id)
            ->pluck('question_id');

        return response()->json([
            'success' => true,
            'score' => (int) $user_pretest->scored,
            'answered_questions' => $answered_questions_ids,
            'already_answered' => true
        ]);
    }

    AnsweredQuestions::create([
        'user_id' => auth()->id(),
        'module_id' => $request->module_id,
        'question_id' => $question->id,
        'answered_at' => now()
    ]);

    $user_pretest->increment('scored', $question->points);

    $user_pretest->refresh();

    session()->forget('pretest_coding_run');

    $answered_questions_ids = AnsweredQuestions::where('user_id', auth()->id())
        ->where('module_id', $request->module_id)
        ->pluck('question_id');

    return response()->json([
        'success' => true,
        'score' => (int) $user_pretest->scored,
        'answered_questions' => $answered_questions_ids
    ]);
}
}
