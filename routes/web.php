<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Pages\QuestionsPage;
use App\Http\Controllers\Question;
use App\Http\Controllers\Register;
use App\Http\Controllers\Subject;
use App\Http\Controllers\Topic;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyOTP;
use App\Models\Questions;
use App\Models\RecentActivity;
use App\Models\Subjects;
use App\Models\Topics;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompilerController;





Route::middleware(['guest'])->group(function(){
    Route::get('/', function(){
        return view('Auth.Login');
    })->name('login');

    Route::get('/register', function(){
        return view('Auth.Register');
    })->name('register');

    Route::get('/account_verification', function(){

        $otp_session = session('otp_session');
        if(!$otp_session){
            return redirect()->route('login');
        }

        return view('Auth.Account_Verification');
    })->name('account_verification');


    Route::post('/login',[Login::class, 'login'])->middleware('throttle:3,1');
    Route::post('/register', [Register::class, 'register'])->middleware('throttle:3,1');
    Route::post('/verify_otp', [VerifyOTP::class, 'verify'])->middleware('throttle:2,1');

});



Route::middleware(['auth'])->group(function(){


    Route::get('/home', function () {
        return view('Client.Pages.Home');
    })->name('home');

    Route::get('/discrete_mathematics', function() {
        return view('Client.Pages.Review_Pages.DM');
    })->name('discrete_math');

    Route::get('/quiz_discrete_math', function(){
        return view('Client.Pages.Quiz_Pages.DM');
    })->name('discrete_quiz');

    Route::post('/logout', [Logout::class, 'logout']);
});




// ADMIN
Route::middleware(['auth','Admin'])->group(function(){
    // ===========================================================
    // ===========================================================
    Route::get('/dashboard', function(){
        $total_users = User::count();
        $recent_activities = RecentActivity::orderBy('created_at', 'DESC')->get();
        return view('Admin.Pages.Dashboard', compact(
            'total_users',
            'recent_activities',
        ));
    })->name('dashboard_page');

    // ===========================================================
    // ===========================================================
    Route::get('/users', function(){
        $users = User::select('id','id_number', 'name', 'email','role', 'status')->get();
        return view('Admin.Pages.Users', compact(
            'users'
        ));
    })->name('users_page');

    // ===========================================================
    // ===========================================================
    Route::get('/subjects', function(){

        $subjects = Subjects::select('id', 'subject_name', 'slug')->get();
        $topics = Topics::select('id', 'subject_id', 'topic_name')->get();
        $questions = Questions::select('id', 'topic_id')->get();

        return view('Admin.Pages.Subjects', compact(
            'subjects',
            'topics',
            'questions'
        ));
    })->name('subjects_page');

    // ===========================================================
    // ===========================================================
    Route::get('/feedbacks', function(){
        return view('Admin.Pages.Feedbacks');
    })->name('feedbacks_page');



    // ===========================================================
    // ===========================================================

    // USERS
    Route::put('/promoteUser', [UserController::class, 'promoteUser']);
    Route::put('/demoteUser', [UserController::class, 'demoteUser']);
    Route::delete('/deleteUser', [UserController::class, 'deleteUser']);


    // SUBJECTS
    Route::post('/addSubject', [Subject::class, 'addSubject'])->name('addSubject');
    

    // QUESTIONS
    Route::post('/addQuestion', [Question::class, 'addQuestion']);
    Route::put('/editQuestion', [Question::class, 'editQuestion']);
    Route::delete('/deleteQuestion', [Question::class, 'deleteQuestion']);
    
    Route::get('/questions/{subject}/{topic}/{id}',[QuestionsPage::class, 'questions']);


    // TOPICS
    Route::post('/addTopic',[Topic::class, 'addTopic']);
    Route::put('/editTopic', [Topic::class, 'editTopic']);
    Route::delete('deleteTopic', [Topic::class, 'deleteTopic']);

    Route::post('/logout', [Logout::class, 'logout']);
});

//compiler
Route::get('/compiler', [CompilerController::class, 'index']);
Route::post('/run-code', [CompilerController::class, 'run']);