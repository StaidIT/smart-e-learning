<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Choices;
use App\Models\Modules;
use App\Models\Questions;
use App\Models\Subjects;
use Illuminate\Http\Request;
// use App\Models\Topics;

class QuestionsPage extends Controller
{
    public function questions(Request $request)
    {
        $topic = $request->topic;
        $subject_name = $request->subject_name;
        $module_name = $request->module_name;
        $module_id = $request->module_id;

        $questionColumns = [
            'id',
            'module_id',
            'question',
            'question_type',
            'answer',
            'explanation',
        ];

        if ($module_name === 'All') {

            $subject_id = $module_id;

            $module_ids = Modules::where('subject_id', $subject_id)
                ->pluck('id');

            $questionsQuery = Questions::whereIn('module_id', $module_ids);

            if ($topic !== 'none') {
                $questionsQuery->where('topic_id', $topic);
            }

            $questions = $questionsQuery
                ->select($questionColumns)
                ->get();

            $module_id = '';

        } else {

            $subject_id = Modules::where('id', $module_id)
                ->value('subject_id');

            $questionsQuery = Questions::where('module_id', $module_id);

            if ($topic !== 'none') {
                $questionsQuery->where('topic_id', $topic);
            }

            $questions = $questionsQuery
                ->select($questionColumns)
                ->get();
        }

        $subject_name = Subjects::where('id', $subject_id)
            ->value('subject_name');

        $subjects = Subjects::select(
            'id',
            'subject_name'
        )->get();

        $modules = Modules::where('subject_id', $subject_id)
            ->select(
                'id',
                'subject_id',
                'module_name'
            )
            ->get();

        $question_ids = $questions->pluck('id');

        $choices = $question_ids->isEmpty()
            ? collect()
            : Choices::whereIn('question_id', $question_ids)
                ->select(
                    'id',
                    'question_id',
                    'choice_A',
                    'choice_B',
                    'choice_C',
                    'choice_D'
                )
                ->get();

        return view('Admin.Pages.Questions', compact(
            'subjects',
            'modules',
            'questions',
            'choices',
            'module_id',
            'subject_name'
        ));
    }
}