<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSchoolController;

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
    Route::resource('school', AdminSchoolController::class)->except(['create', 'show', 'edit'])->names('admin.school');
    Route::resource('teacher', AdminTeacherController::class)->names('admin.teacher');
    Route::resource('student', AdminStudentController::class)->names('admin.student');
    Route::resource('quiz', AdminQuizController::class)->names('admin.quiz');
});