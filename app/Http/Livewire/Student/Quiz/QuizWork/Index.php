<?php

namespace App\Http\Livewire\Student\Quiz\QuizWork;

use Livewire\Component;
use App\Models\Question;
use App\Models\QuizStudent;
use App\Models\QuizStudentAnswer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $quiz;
    public $active_question = 1;
    public $selectedOptions = [];

    // public $start_work_time, $end_work_time, $remaining_time;
    // public $waktu_sekarang;

    public function mount()
    {
        // dd($this->quiz->duration);
        // $this->start_work_time = Carbon::now("Asia/Makassar");
        // $this->end_work_time = $this->start_work_time->copy()->addMinutes($this->quiz->duration);
        // $this->remaining_time = $this->end_work_time->copy()->diffInMinutes(Carbon::now("Asia/Makassar"));
        // $this->updateRemainingTime();
        // $this->checkTimeOut();
        // $this->updatedWaktuSekarang();
    }

    public function render()
    {
        // dd("$this->start_work_time -- $this->end_work_time");
        return view('livewire.student.quiz.quiz-work.index', [
            "questions" => Question::where("quiz_id", $this->quiz->id)->get(),
        ]);
    }

    // public function updatedWaktuSekarang()
    // {
    //     // dd("ok");
    //     $this->waktu_sekarang = Carbon::now("Asia/Makassar");

    //     if ($this->waktu_sekarang >= $this->end_work_time) {
    //         dd("end");
    //         // Aksi yang ingin Anda lakukan jika waktu_sekarang sama dengan atau melebihi end_work_time
    //     }
    // }

    // public function updateRemainingTime()
    // {
    //     $currentTime = Carbon::now("Asia/Makassar");
    //     $remainingTime = $this->end_work_time->diffInSeconds($currentTime);
    //     if ($this->end_work_time <= $this->start_work_time) {
    //         dd("timeout");
    //         // Aksi yang ingin Anda lakukan ketika waktu habis
    //         // Misalnya, redirect ke halaman lain atau menampilkan pesan
    //     } else {
    //         $this->end_work_time->subSecond();
    //     }
    //     // Update nilai sisa waktu dalam format yang diinginkan (misalnya menit:detik)
    //     $this->remaining_time = gmdate('i:s', $remainingTime);
    // }

    // public function timeExpired()
    // {
    //     dd("out");
    //     // Aksi yang ingin Anda lakukan ketika waktu habis
    //     // Misalnya, redirect ke halaman lain atau menampilkan pesan
    // }

    // public function checkTimeOut(){
    //     if (Carbon::now("Asia/Makassar") == $this->end_work_time) {
    //         dd("habis");
    //     }else{
    //         $this->checkTimeOut();
    //     }
    // }

    // public function updateRemainingTime()
    // {
    //     // dd($this->remaining_time);
    //     $now = Carbon::now("Asia/Makassar");
    //     $remainingSeconds = $this->end_work_time->diffInSeconds($now);
    //     // dd($remainingSeconds);
    //     if ($remainingSeconds < 0) {
    //         $remainingSeconds = 0;
    //         dd("stop");
    //         // Lakukan tindakan lain jika waktu berakhir telah tercapai
    //         // Contoh: Menghentikan quiz atau melakukan redirect
    //     }

    //     $this->remaining_time = gmdate('H:i:s', $remainingSeconds);
    //     $this->emit('updateRemainingTime', $this->remaining_time);
    // }

    public function nextQuestion()
    {
        // dd($this->start_work_time);
        // dd($this->remaining_time);
        if ($this->active_question !== $this->quiz->question->count()) {
            $this->active_question++;
        }
    }

    public function previousQuestion()
    {
        if ($this->active_question != 1) {
            $this->active_question--;
        }
    }

    public function setQuestion($number)
    {
        $this->active_question = $number;
    }

    public function saveAnswer()
    {
        // dd("Save");
        // redirect()->route("student.profile.index");
        // hitung score
        $question_total = $this->quiz->question->count();
        $question_point = 100 / $question_total;
        $score = 0;

        $quiz_id = $this->quiz->id;
        $student_id = Auth::guard('student')->user()->id;
        // simpan jawaban
        foreach ($this->selectedOptions as $key => $selectedOption) {
            if ($selectedOption == Question::find($key)->correct_answer) {
                $is_correct = 1;
                $score = $score + $question_point;
            } else {
                $is_correct = 0;
            }
            QuizStudentAnswer::create([
                "quiz_id" => $quiz_id,
                "student_id" => $student_id,
                "question_id" => $key,
                "answer" => $selectedOption,
                "is_correct" => $is_correct,
            ]);
        }

        // sipman quiz_student
        QuizStudent::create([
            "quiz_id" => $quiz_id,
            "student_id" => Auth::guard('student')->user()->id,
            "score" => $score,
        ]);
        return redirect()->route("student.profile.index")->with("success", "quiz berhasil di selesaikan");
    }

    public function stopQuiz()
    {
        dd("timeOUT");
    }
}
