<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Choices;
use App\Models\Modules;
use App\Models\Questions;
use App\Models\Subjects;
// use App\Models\Topics;

class QuestionsPage extends Controller
{

    public function questions($subject, $module, $id)
    {
        $questionColumns = [
            'id',
            'module_id',
            'question',
            'question_type',
            'answer',
            'explanation',
            
        ];

        if ($module === 'All') {

            $subject_id = $id;

            $module_ids = Modules::where('subject_id', $subject_id)
                ->pluck('id');

            $questions = Questions::whereIn('module_id', $module_ids)
                ->select($questionColumns)
                ->get();

            $module_id = '';

        } else {

            $questions = Questions::where('module_id', $id)
                ->select($questionColumns)
                ->get();

            $module_id = $id;

            $subject_id = Modules::where('id', $id)
                ->value('subject_id');
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