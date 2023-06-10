<?php

namespace App\Http\Livewire\School;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class Index extends Component
{
    public $school_id, $school_name, $school_category;

    public function render()
    {
        return view('livewire.school.index', [
            "schools" => School::all(),
        ]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            "school_name" => "required|string",
            "school_category" => "required|in:SMP,SMA",
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            "school_name" => "required|string",
            "school_category" => "required|in:SMP,SMA",
        ]);
        School::create($validated);
        session()->flash("success", "Sekolah berhasil di tambahkan");

        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function edit(School $school)
    {
        $this->setField($school);
    }

    function update(School $school)
    {
        $validated = $this->validate([
            "school_name" => "required|string",
            "school_category" => "required|in:SMP,SMA",
        ]);
        $school->update($validated);
        session()->flash("success", "Sekolah berhasil diperbaharui");

        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function destroy(School $school)
    {
        $teacherUse = Teacher::where('school_id', $school->id)->count();
        $studentUse = Student::where('school_id', $school->id)->count();
        if ($teacherUse > 0 || $studentUse >0) {
            session()->flash("failed", "$school->school_name tidak dapat dihapus karena digunakan di $teacherUse Guru dan $studentUse Siswa");
            $this->resetField();
            $this->dispatchBrowserEvent('close-modal');
        } else {
            $school->delete();
            session()->flash("success", "Sekolah berhasil dihapus");
            $this->resetField();
            $this->dispatchBrowserEvent('close-modal');
        }

    }

    function resetField()
    {
        $this->school_id = '';
        $this->school_name = '';
        $this->school_category = '';
    }

    function setField(School $school)
    {
        $this->school_id = $school->id;
        $this->school_name = $school->school_name;
        $this->school_category = $school->school_category;
    }
}
