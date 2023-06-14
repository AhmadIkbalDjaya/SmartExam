<?php

namespace Database\Seeders;

use App\Models\QuizStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizStudents = [];

        for ($i=1; $i < 10; $i++) { 
            $quiz_id = rand(1,2);
            $student_id = $i;
            $score = rand(0,100);

            $quizStudents[] = [
                "quiz_id" => $quiz_id,
                "student_id" => $student_id,
                "score" => $score,
            ];
        }

        QuizStudent::insert($quizStudents);
    }
}
