<?php

namespace App\Http\Controllers;

use App\Models\RecentActivity;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Subject extends Controller
{
    public function addSubject(Request $request){

        $validated = $request->validate([
            'subject_name' => 'required|string|max:100',
        ]);

        $max_order = Subjects::max('order');
        $next_order = is_null($max_order) ? 1 : $max_order + 1; 

        $subjects = Subjects::create([
            'subject_name' => $validated['subject_name'],
            'slug' => Str::slug($validated['subject_name']),
            'order' => $next_order
        ]);

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'added_subject',
            'subject' => $validated['subject_name']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subject added successfully',
            'subject' => $subjects
        ]);

    }
}
