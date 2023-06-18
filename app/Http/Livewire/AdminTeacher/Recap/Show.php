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
        $query = QuizStudent::where("quiz_id", $this->quiz->id)
            ->with("student")
            ->orderBy('score', 'desc');
        if ($this->select_school > 0) {
            $query->whereHas("student", function ($query) {
                $query->where('school_id', $this->select_school);
            });
        }
        $quizStudents = $query->get();
        // dd($quizStudents);
        // foreach ($quizStudents as $key => $q) {
        //     dd($q->student);
        // }
        $schools = School::where("school_category", $this->quiz->quiz_category)->get();
        return view('livewire.admin-teacher.recap.show', [
            "quizStudents" => $quizStudents,
            "schools" => $schools,
        ]);
    }
}
