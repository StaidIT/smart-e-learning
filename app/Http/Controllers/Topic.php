<?php

namespace App\Http\Controllers;

use App\Models\RecentActivity;
use App\Models\Topics;
use Illuminate\Http\Request;

class Topic extends Controller
{

    // ADD TOPIC

    public function addTopic(Request $request){
        $input = $request->validate([
            'subject_id' => 'required|integer',
            'topic_name' => 'required|string|max:255'
        ]);

        Topics::create([
            'subject_id' => $input['subject_id'],
            'topic_name' => $input['topic_name']
        ]);

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'added_topic',
            'subject' => $request->subject_name,
            'topic' => $input['topic_name']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Topic added Successfully'
        ]);
    }

    public function editTopic(Request $request){
        $input = $request->validate([
            'new_topic_name' => 'required|string|max:255'
        ]);
        $topic = Topics::find($request->topic_id);

        $topic->update([
            'topic_name' => $input['new_topic_name']
        ]);

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'edited_topic',
            'subject' => $request->subject_name,
            'topic' => $input['new_topic_name']
        ]);

        return response()->json([
            'success'=> true,
            'message'=> 'Topic updated successfully!'
        ]);

    }

    public function deleteTopic(Request $request){

        $topic = Topics::find($request->topic_id);

        $topic->delete();

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'deleted_topic',
            'subject' => $request->subject_name,
            'topic' => $topic->topic_name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Topic deleted Successfully!'
        ]);
    }
}
