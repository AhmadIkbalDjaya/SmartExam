<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSchoolController;
use App\Http\Controllers\AdminTeacher\QuizController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\AdminTeacher\QuestionController;
use App\Http\Controllers\AdminTeacher\RecapController;
use App\Http\Controllers\AdminTeacher\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

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

Route::prefix('teacher')->group(function () {
    Route::get('', fn () => view('teacher.home.index', ["title" => "home"]))->name('teacher.home.index');
    Route::get('profile', fn () => view('teacher.profile.index', ["title" => "profile"]))->name('teacher.profile.index');
    Route::get('quiz', fn () => view('teacher.quiz.index', ["title" => "quiz"]))->name('teacher.quiz.index');
    Route::get('question', fn () => view('teacher.question.index', ["title" => "question"]))->name('teacher.question.index');
    Route::get('essay', fn () => view('teacher.question.essay', ["title" => "question"]))->name('teacher.question.essay');
    Route::get('recap', fn () => view('teacher.recap.index', ["title" => "recap"]))->name('teacher.recap.index');
    Route::get('student', fn () => view('teacher.student.index', ["title" => "student"]))->name('teacher.student.index');
    Route::get('quizRecap', fn () => view('teacher.quizRecap.index', ["title" => "quizRecap"]))->name('teacher.quizRecap.index');
    Route::get('print', fn () => view('teacher.print.index', ["title" => "print"]))->name('teacher.print.index');
});

Route::get('home', fn () => view('student.home.index', ["title" => "home"]))->name('student.home.index');
Route::get('cbtTest', fn () => view('student.cbtTest.index', ["title" => "cbtTest"]))->name('student.cbtTest.index');
Route::get('profile', fn () => view('student.profile.index', ["title" => "profile"]))->name('student.profile.index');
Route::get('question', fn () => view('student.question.index', ["title" => "question"]))->name('student.question.index');
