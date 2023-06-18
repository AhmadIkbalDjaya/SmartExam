<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "students";
    protected $guarded = ["id"];
    
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function quiz_student()
    {
        return $this->hasMany(QuizStudent::class);
    }

    public function quiz_student_answer()
    {
        return $this->hasMany(QuizStudentAnswer::class);
    }

    public function essay_submission()
    {
        return $this->hasMany(EssaySubmission::class);
    }
}
