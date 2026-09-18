<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Modules;
use App\Models\Subjects;
use App\Models\Topics;
use Illuminate\Http\Request;

class LearnSubject extends Controller
{
    public function subjectLearn(Request $request)
    {
        $subject = Subjects::findOrFail($request->subject_id);

        $modules = Modules::where('subject_id', $subject->id)
            ->orderBy('order')
            ->get();

        $topics = Topics::whereIn('module_id', $modules->pluck('id'))
            ->orderBy('order')
            ->get();

        $subject_name = $subject->subject_name;

        if ($subject->subject_name === 'Discrete Mathematics') {

            return view('Client.Review_Pages.Discrete_Mathematics.Main', compact(
                'subject_name',
                'modules',
                'topics'
            ));

        }

        abort(404);
    }
}