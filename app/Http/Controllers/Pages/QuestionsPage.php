<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Choices;
use App\Models\Questions;
use App\Models\Subjects;
use App\Models\Topics;

class QuestionsPage extends Controller
{
    public function questions($subject, $topic, $id)
    {
        if ($topic === 'All') {
            $topic_ids = Topics::where('subject_id', $id)
                ->pluck('id');

            $questions = Questions::whereIn('topic_id', $topic_ids)
                ->get();

            $topic_id = 0;

            $subject_name = Subjects::where('id', $id)
                ->value('subject_name');
        } else {
            $questions = Questions::where('topic_id', $id)
                ->get();

            $topic_id = (int) $id;

            $subject_id = Topics::where('id', $id)
                ->value('subject_id');

            $subject_name = Subjects::where('id', $subject_id)
                ->value('subject_name');
        }

        $subjects = Subjects::select(
            'id',
            'subject_name'
        )->get();

        $topics = Topics::select(
            'id',
            'subject_id',
            'topic_name'
        )->get();

        $choices = Choices::select(
            'id',
            'question_id',
            'choice_A',
            'choice_B',
            'choice_C',
            'choice_D'
        )->get();

        return view('Admin.Pages.Questions', compact(
            'subjects',
            'topics',
            'questions',
            'choices',
            'topic_id',
            'subject_name'
        ));
    }
}