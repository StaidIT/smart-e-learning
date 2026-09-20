<?php

use App\Http\Controllers\Client\LearnSubject;
use App\Http\Controllers\Client\Pretest;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Pages\QuestionsPage;
use App\Http\Controllers\Question;
use App\Http\Controllers\QuestionImport;
use App\Http\Controllers\Register;
use App\Http\Controllers\Subject;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyOTP;
use App\Models\Modules;
use App\Models\Questions;
use App\Models\RecentActivity;
use App\Models\Subjects;
use App\Models\Topics;
use App\Models\User;
use App\Models\UserPretest;
use Illuminate\Support\Facades\Route;


Route::post('/compiler/run', [CompilerController::class, 'run']);


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



// CLIENT ------------------------------------------------------------------------------------------------------------------------------------------------
// CLIENT ------------------------------------------------------------------------------------------------------------------------------------------------
// CLIENT ------------------------------------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth'])->group(function(){

    // ===========================================================
    // ===========================================================
    Route::get('/home', function () {
        // Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        $subjects = Subjects::all();
        $modules = Modules::all();
        $questions = Questions::all();
        $user_pretests = UserPretest::where('user_id', auth()->user()->id)->get();
        return view('Client.Pages.Home', compact(
            'subjects',
            'modules',
            'questions',
            'user_pretests'
        ));
    })->name('home');


    // ===========================================================
    // ===========================================================
    Route::get('/discrete_mathematics', function() {
        return view('Client.Review_Pages.DM');
    })->name('discrete_math');

    

    // ===========================================================
    // ===========================================================
    Route::get('/quiz_discrete_math', function(){
        return view('Client.Pages.Quiz_Pages.DM');
    })->name('discrete_quiz');

    Route::get('/code', function(){
        return view('Client.Pages.Pretest_code');
    });


    // ===========================================================
    // ===========================================================

    Route::get('/learn/{subject_name}/{subject_id}', [LearnSubject::class, 'subjectLearn']);
    Route::get('/result/{subject_name}/{subject_id}/{topic_name}/{topic_id}', [Pretest::class, 'resultPretest']);
    Route::post('/submitAnswer', [Pretest::class, 'submitAnswer']);
    Route::get('/pretest/{subject_name}/{subject_id}', [Pretest::class, 'pretestModules']);
    Route::get('/takingPretest/{subject_name}/{subject_id}/{module_name}/{module_id}', [Pretest::class, 'takingPretest']);

    Route::post('/logout_student', [Logout::class, 'logout']);

});




// ADMIN ------------------------------------------------------------------------------------------------------------------------------------------------
// ADMIN ------------------------------------------------------------------------------------------------------------------------------------------------
// ADMIN ------------------------------------------------------------------------------------------------------------------------------------------------
// ADMIN ------------------------------------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth','Admin'])->group(function(){
    // ===========================================================
    // ===========================================================
    Route::get('/dashboard', function(){
        $total_users = User::count();
        $total_admins = User::where('role', 'Admin')->count();
        $total_subjects = Subjects::count();
        $recent_activities = RecentActivity::orderBy('created_at', 'DESC')->get();
        return view('Admin.Pages.Dashboard', compact(
            'total_users',
            'total_admins',
            'total_subjects',
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
        $modules = Modules::select( 'id', 'order', 'subject_id', 'module_name' )
        ->orderBy('subject_id')
        ->orderBy('order', 'asc')
        ->get();
        $questions = Questions::select('id', 'module_id')->get();
        $topics = Topics::whereIn('module_id', $modules->pluck('id'))
            ->orderBy('module_id')
            ->orderBy('order', 'asc')
            ->get();

        return view('Admin.Pages.Subjects', compact(
            'subjects',
            'modules',
            'topics',
            'questions',
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
    Route::post('/extractQuestions', [QuestionImport::class, 'extractQuestions']);
    Route::post('/importQuestions', [QuestionImport::class, 'importQuestions']); 

    Route::get('/questions/{subject}/{module}/{id}',[QuestionsPage::class, 'questions']);


    // MODULES
    Route::post('/addModule',[ModuleController::class, 'addModule']);
    Route::put('/editModule', [ModuleController::class, 'editModule']);
    Route::delete('deleteModule', [ModuleController::class, 'deleteModule']);

    // TOPICS
    Route::post('/addTopic', [TopicController::class, 'addTopic']);

    Route::post('/logout', [Logout::class, 'logout']);
});

//compiler
Route::get('/compiler', [CompilerController::class, 'index']);
Route::post('/run-code', [CompilerController::class, 'run']);