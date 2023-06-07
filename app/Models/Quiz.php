<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function question()
    {
        return $this->hasMany(Question::class);
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
