<?php

namespace App\Http\Livewire\AdminTeacher\Recap;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\QuizStudent;
use App\Models\School;

class Show extends Component
{
    public $quiz;
    public $select_school = "";

    public function render()
    {
        // $quizStudents = QuizStudent::where("quiz_id", $this->quiz->id)->where("quiz->student->school->id", $this->select_school)->orderBy('score', 'desc')->get();
        // if ($this->select_school > 0) {
        //     $quizStudents = QuizStudent::where("quiz_id", $this->quiz->id)
        //         ->whereHas('student', function ($query) {
        //             $query->where('school_id', $this->select_school);
        //         })
        //         ->with('student')
        //         ->orderBy('score', 'desc')
        //         ->get();
        // } else {
        //     $quizStudents = QuizStudent::where("quiz_id", $this->quiz->id)
        //         ->with('student')
        //         ->orderBy('score', 'desc')
        //         ->get();
        // }
        $query = QuizStudent::where("quiz_id", $this->quiz->id)
                ->with("student")
                ->orderBy('score', 'desc');
        if ($this->select_school > 0) {
            $query->whereHas("student", function ($query) {
                $query->where('school_id', $this->select_school);
            });
        }
        $quizStudents = $query->get();

        $schools = School::where("school_category", $this->quiz->quiz_category)->get();
        return view('livewire.admin-teacher.recap.show', [
            "quizStudents" => $quizStudents,
            "schools" => $schools,
        ]);
    }
}
