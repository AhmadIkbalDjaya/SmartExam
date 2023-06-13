<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSchoolController;
use App\Http\Controllers\AdminTeacher\QuizController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\AdminTeacher\StudentController;

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

Route::prefix('admin')->group(function (){
    Route::get('', fn()=>view("admin.home.index", ["title" => "Admin Dashboard"]))->name('admin.home.index');
    Route::get('school', [AdminSchoolController::class, 'index'])->name('admin.school.index');
    Route::get('teacher', [AdminTeacherController::class, 'index'])->name('admin.teacher.index');
    Route::get('student', [StudentController::class, 'index'])->name('admin.student.index');
    Route::resource('quiz', QuizController::class)->except(['create', 'show', 'edit'])->names('admin.quiz');
    Route::get('quiz/question', fn()=>view("admin.question.index", ["title" => "Pertanyaan"]))->name('admin.question.index');
    Route::get('quiz/essay', fn()=>view("admin.question.essay"))->name('admin.question.essay');

    Route::get('/admin/recap', fn()=> view('admin.recap.index', ["title" => "recap"]))->name('admin.recap.index');
    Route::get('/admin/profile', fn()=> view('admin.profile.index', ["title" => "profil"]))->name('admin.profile.index');
    Route::get('/admin/quizRecap', fn()=> view('admin.quizRecap.index', ["title" => "quizRecap"]))->name('admin.quizRecap.index');
    Route::get('/admin/print', fn()=> view('admin.print.index', ["title" => "print"]))->name('admin.print.index');
    

    Route::get('/teacher/home', fn()=> view('teacher.home.index', ["title" => "home"]))->name('teacher.home.index');
    Route::get('/teacher/student', fn()=> view('teacher.student.index', ["title" => "student"]))->name('teacher.student.index');
    Route::get('/teacher/quiz', fn()=> view('teacher.quiz.index', ["title" => "quiz"]))->name('teacher.quiz.index');
    Route::get('/teacher/question', fn()=> view('teacher.question.index', ["title" => "question"]))->name('teacher.question.index');
    Route::get('/teacher/essay', fn()=> view('teacher.question.essay', ["title" => "question"]))->name('teacher.question.essay');
    Route::get('/teacher/recap', fn()=> view('teacher.recap.index', ["title" => "recap"]))->name('teacher.recap.index');
    Route::get('/teacher/quizRecap', fn()=> view('teacher.quizRecap.index', ["title" => "quizRecap"]))->name('teacher.quizRecap.index');
    Route::get('/teacher/print', fn()=> view('teacher.print.index', ["title" => "print"]))->name('teacher.print.index');
    Route::get('/teacher/profile', fn()=> view('teacher.profile.index', ["title" => "profile"]))->name('teacher.profile.index');

    Route::get('/student/home', fn()=> view('student.home.index', ["title" => "home"]))->name('student.home.index');
    Route::get('/student/cbtTest', fn()=> view('student.cbtTest.index', ["title" => "cbtTest"]))->name('student.cbtTest.index');
    Route::get('/student/profile', fn()=> view('student.profile.index', ["title" => "profile"]))->name('student.profile.index');
});