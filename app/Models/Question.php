<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function option()
    {
        return $this->hasMany(Option::class);
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
