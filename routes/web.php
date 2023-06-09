<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSchoolController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;

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
    Route::get('', fn()=>view("admin.home.index"))->name('admin.home.index');
    Route::resource('school', AdminSchoolController::class)->except(['create', 'show', 'edit'])->names('admin.school');
    Route::resource('teacher', AdminTeacherController::class)->except(['create', 'show', 'edit'])->names('admin.teacher');
    Route::resource('student', AdminStudentController::class)->except(['create', 'show', 'edit'])->names('admin.student');
    Route::resource('quiz', AdminQuizController::class)->except(['create', 'show', 'edit'])->names('admin.quiz');
    Route::get('quiz/question', fn()=>view("admin.question.index"))->name('admin.question.index');
    Route::get('quiz/essay', fn()=>view("admin.question.essay"))->name('admin.question.essay');
    
});