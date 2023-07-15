<?php

namespace App\Http\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;
use App\Models\QuizStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $password, $password_confirmation;
    public $quiz_student_id, $quiz_id, $quiz_name, $quiz_code, $quiz_category, $quiz_type, $start_time, $end_time, $duration, $is_active, $show_score;
    public $question_count;
    public $score;

    public function setField(QuizStudent $quizStudent)
    {
        $this->quiz_student_id = $quizStudent->id;
        $this->quiz_id = $quizStudent->quiz->id;
        $this->quiz_name = $quizStudent->quiz->quiz_name;
        $this->quiz_code = $quizStudent->quiz->quiz_code;
        $this->quiz_category = $quizStudent->quiz->quiz_category;
        $this->quiz_type = $quizStudent->quiz->quiz_type;
        $this->start_time = $quizStudent->quiz->start_time;
        $this->end_time = $quizStudent->quiz->end_time;
        $this->duration = $quizStudent->quiz->duration;
        $this->is_active = $quizStudent->quiz->is_active;
        $this->show_score = $quizStudent->quiz->show_score;
        $this->score = $quizStudent->score;
        $this->question_count = $quizStudent->quiz->question->count();
    }

    public function render()
    {
        $authUser = Auth::guard('student')->user();
        return view('livewire.student.profile.index', [
            "student" => $authUser,
            "quizStudents" => QuizStudent::where('student_id', $authUser->id)->latest()->get(),
        ]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            "password" => "required|min:8|confirmed",
        ]);
    }

    public function changePassword()
    {
        $validated = $this->validate([
            "password" => "required|min:8|confirmed",
        ]);
        // $validated["password"] = Hash::make($validated["password"]);
        $user = Student::find(Auth::guard('student')->user()->id);
        $user->update($validated);
        session()->flash("success", "Password berhasil diubah");
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    public function resetField()
    {
        $this->password = "";
        $this->password_confirmation = "";
    }
}
