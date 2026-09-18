<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use App\Models\RecentActivity;
use App\Models\Topics;
use Illuminate\Http\Request;

class Topic extends Controller
{

    // ADD TOPIC

    public function addModule(Request $request){
        $input = $request->validate([
            'subject_id' => 'required|uuid',
            'module_name' => 'required|string|max:255'
        ]);

        $maxOrder = Modules::where('subject_id', $input['subject_id'])->max('order');
        $nextOrder = is_null($maxOrder) ? 1 : $maxOrder + 1;
        $topics = Modules::create([
            'order' => $nextOrder,
            'subject_id' => $input['subject_id'],
            'module_name' => $input['module_name']
        ]);

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'added_module',
            'subject' => $request->subject_name,
            'module' => $input['module_name']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Topic added Successfully',
            'new_topics' => $topics
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

    public function deleteTopic(Request $request)
    {
        $topic = Topics::find($request->topic_id);

        if (!$topic) {
            return response()->json([
                'success' => false,
                'message' => 'Topic not found!'
            ], 444);
        }

        $topicName = $topic->topic_name;
        $topicId = $topic->id;

        $topic->delete();

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'deleted_topic',
            'subject' => $request->subject_name,
            'topic' => $topicName
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Topic deleted Successfully!',
            'deleted_topic_id' => $topicId
        ]);
    }
}
