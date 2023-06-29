<?php

namespace App\Http\Livewire\AdminTeacher\Recap;

use App\Models\EssaySubmission;
use App\Models\Quiz;
use Livewire\Component;
use App\Models\QuizStudent;
use App\Models\School;

class Show extends Component
{
    public $quiz;
    public $select_school = "";
    public $score, $student_id;
    public $file;

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
        $schools = School::where("school_category", $this->quiz->quiz_category)->get();
        return view('livewire.admin-teacher.recap.show', [
            "quizStudents" => $quizStudents,
            "schools" => $schools,
            "quiz" => $this->quiz,
        ]);
    }

    public function showEssayModal($student_id) {
        $essay_submission = EssaySubmission::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $quiz_student = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $this->score = $quiz_student->score;
        $this->file = $essay_submission->file;
        $this->student_id = $essay_submission->student->id;
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            "score" => "required|numeric|min:0|max:100",
        ]);
    }

    public function updateEssayScore($student_id){
        $validated = $this->validate([
            "score" => "required|numeric|min:0|max:100",
        ]);
        $quiz_student = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $quiz_student->update($validated);
        session()->flash("success", "nilai berhasil diperbaharui");
        $this->dispatchBrowserEvent("close-modal");
    }
}
