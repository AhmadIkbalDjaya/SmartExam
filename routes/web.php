<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminTeacher\DashboardController;
use App\Http\Controllers\Admin\AdminSchoolController;
use App\Http\Controllers\AdminTeacher\QuizController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\AdminTeacher\RecapController;
use App\Http\Controllers\AdminTeacher\StudentController;
use App\Http\Controllers\AdminTeacher\QuestionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Student\StudentHomeController;
use App\Http\Controllers\Student\StudentQuizController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth:user', 'user'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('admin.home.index');
        Route::get('school', [AdminSchoolController::class, 'index'])->name('admin.school.index');
        Route::get('teacher', [AdminTeacherController::class, 'index'])->name('admin.teacher.index');
        Route::get('student', [StudentController::class, 'index'])->name('admin.student.index');
        Route::get('quiz', [QuizController::class, 'index'])->name('admin.quiz.index');
        Route::get('quiz/{quiz}/question', [QuestionController::class, 'index'])->name('admin.question.index');
        Route::get('recap', [RecapController::class, 'index'])->name('admin.recap.index');
        Route::get('recap/quiz/{quiz}', [RecapController::class, 'showQuizRecap'])->name('admin.recap.quiz.index');
        Route::get('/recap/quiz/{quiz}/print', [RecapController::class, "printRecap"])->name('admin.recap.quiz.print');
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    });
});

Route::middleware(['auth:teacher', 'teacher'])->group(function () {
    Route::prefix('teacher')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('teacher.home.index')->middleware(['auth:teacher', 'teacher']);
        Route::get('student', [StudentController::class, 'index'])->name('teacher.student.index');
        Route::get('quiz', [QuizController::class, 'index'])->name('teacher.quiz.index');
        Route::get('quiz/{quiz}/question', [QuestionController::class, 'index'])->name('teacher.question.index');
        Route::get('recap', [RecapController::class, 'index'])->name('teacher.recap.index');
        Route::get('recap/quiz/{quiz}', [RecapController::class, 'showQuizRecap'])->name('teacher.recap.quiz.index');
        Route::get('/recap/quiz/{quiz}/print', [RecapController::class, "printRecap"])->name('teacher.recap.quiz.print');
        Route::get('profile', [ProfileController::class, 'index'])->name('teacher.profile.index');
    });
});

Route::middleware(['auth:student', 'student'])->group(function () {
    Route::get('', [StudentHomeController::class, "index"])->name('student.home.index');
    Route::get('quiz', [StudentQuizController::class, 'index'])->name('student.quiz.index');
    Route::get('profile', fn () => view('student.profile.index', ["title" => "profile"]))->name('student.profile.index');
    Route::get('question', fn () => view('student.question.index', ["title" => "question"]))->name('student.question.index');
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('loginProcess')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
