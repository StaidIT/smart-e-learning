<?php

namespace App\Http\Controllers;

use App\Models\Choices;
use App\Models\Questions;
use App\Models\RecentActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Question extends Controller
{

    // ADD QUESTION
    // EDIT QUESTIO
    // DELETE QUESTION

    public function addQuestion(Request $request)
    {
        $input = $request->validate([
            'question' => 'required|string|max:6000',
            'question_type' => 'required|string|in:multipleChoice,TorF,identification',
            'topic_id' => 'required|integer|exists:topics,id',

            'choice_A' => 'required_if:question_type,multipleChoice|nullable|string|max:2000',
            'choice_B' => 'required_if:question_type,multipleChoice|nullable|string|max:2000',
            'choice_C' => 'required_if:question_type,multipleChoice|nullable|string|max:2000',
            'choice_D' => 'required_if:question_type,multipleChoice|nullable|string|max:2000',

            'correct_choice' => 'exclude_unless:question_type,multipleChoice|required|string|in:A,B,C,D',
            'correct_answer' => 'exclude_if:question_type,multipleChoice|required|string|max:2000',
        ]);

        if ($input['question_type'] === 'multipleChoice') {

            $correct_answer = '';
            if($input['correct_choice'] === 'A'){
                $correct_answer = $input['choice_A'];
            }elseif ($input['correct_choice'] === 'B') {
                $correct_answer = $input['choice_B'];
            }
            elseif ($input['correct_choice'] === 'C') {
                $correct_answer = $input['choice_C'];
            }
            elseif ($input['correct_choice'] === 'D') {
                $correct_answer = $input['choice_D'];
            }

            $question = Questions::create([
                'topic_id' => $input['topic_id'],
                'question' => $input['question'],
                'question_type' => $input['question_type'],
                'answer' => $correct_answer,
            ]);

            Choices::create([
                'question_id' => $question->id,
                'choice_A' => $input['choice_A'],
                'choice_B' => $input['choice_B'],
                'choice_C' => $input['choice_C'],
                'choice_D' => $input['choice_D'],
            ]);

        } elseif($input['question_type'] === 'TorF') {
            Questions::create([
                'topic_id' => $input['topic_id'],
                'question' => $input['question'],
                'question_type' => $input['question_type'],
                'answer' => $input['correct_answer'],
            ]);
        }elseif($input['question_type'] === 'identification'){
            Questions::create([
                'topic_id' => $input['topic_id'],
                'question' => $input['question'],
                'question_type' => $input['question_type'],
                'answer' => $input['correct_answer'],
            ]);
        }   

        $questions = Questions::where('topic_id', $input['topic_id'])->select('id', 'question', 'question_type', 'answer')->get();

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'added_question',
            'subject' => $request->subject_name,
            'topic' => $request->topic_name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Question added successfully!',
            'questions' => $questions
        ]);


    }




    public function editQuestion(Request $request)
    {
        $question = Questions::find($request->question_id);

        if ($request->question_type === 'multipleChoice') {
            $data = $request->validate([
                'question' => 'required|string|max:2000',
                'choice_A' => 'required|string|max:2000',
                'choice_B' => 'required|string|max:2000',
                'choice_C' => 'required|string|max:2000',
                'choice_D' => 'required|string|max:2000',
                'correct_choice' => 'required|in:A,B,C,D',
                'answer' => 'required|string|max:2000',
            ]);

            $question->update([
                'question' => $data['question'],
                'answer' => $data['answer'],
                'updated_at' => Carbon::now(),
            ]);

            Choices::where('question_id', $question->id)->update([
                'choice_A' => $data['choice_A'],
                'choice_B' => $data['choice_B'],
                'choice_C' => $data['choice_C'],
                'choice_D' => $data['choice_D'],
                'updated_at' => Carbon::now(),
            ]);
        }

        if ($request->question_type === 'TorF') {
            $data = $request->validate([
                'question' => 'required|string|max:2000',
                'answer' => 'required|in:True,False',
            ]);

            $question->update([
                'question' => $data['question'],
                'answer' => $data['answer'],
                'updated_at' => Carbon::now(),
            ]);
        }

        if ($request->question_type === 'identification') {
            $data = $request->validate([
                'question' => 'required|string|max:2000',
                'answer' => 'required|string|max:2000',
            ]);

            $question->update([
                'question' => $data['question'],
                'answer' => $data['answer'],
                'updated_at' => Carbon::now(),
            ]);
        }

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'edited_question',
            'subject' => $request->subject_name,
            'topic' => $request->topic_name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Question updated successfully'
        ]);
    }



    public function deleteQuestion(Request $request){
        $data = $request->validate([
            'question_id' => 'required|integer'
        ]);

        $question = Questions::find($data['question_id']);

        RecentActivity::create([
            'name' => auth()->user()->name,
            'action' => 'deleted_question',
            'subject' => $request->subject_name,
            'topic' => $request->topic_name
        ]);

        if(!$question){
            return response()->json([
                'message' => 'Question not found'
            ], 404);
        }

        $question->delete();
        return response()->json([
            'success' => true,
            'message' => 'Question Deleted Successfully!'
        ]);
    }
}
