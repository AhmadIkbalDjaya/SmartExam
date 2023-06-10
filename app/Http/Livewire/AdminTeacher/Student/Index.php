<?php

namespace App\Http\Livewire\AdminTeacher\Student;

use App\Models\Student;
use App\Models\School;
use Livewire\Component;

class Index extends Component
{
    public $student_id, $username, $password, $school_id, $school_name, $name, $gender;
    public $student_edit_id;

    public function render()
    {
        // $students = Student::where('school_id', auth()->teacher()->school_id);
        $students = Student::latest()->get();
        return view('livewire.admin-teacher.student.index', [
            "students" => $students,
            "schools" => School::all(),
        ]);
    }

    function updated($fields)
    {
        $this->validateOnly($fields, [
            "username" => "required|unique:students,username," . $this->student_edit_id . "",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
            "name" => "required|string",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
    }

    function store()
    {
        $validated = $this->validate([
            "username" => "required|unique:students,username",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
            "name" => "required|string",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        Student::create($validated);
        session()->flash("success", "Siswa berhasil ditambahkan");
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function edit(Student $student)
    {
        $this->student_edit_id = $student->id;
        $this->setField($student);
    }

    function update(Student $student)
    {
        $validated = $this->validate([
            "username" => "required|unique:students,username," . $this->student_edit_id . "",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
            "name" => "required|string",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        $student->update($validated);
        session()->flash("success", "Siswa berhasil di perbaharui");
        $this->student_edit_id = '';
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }
    
    function destroy(Student $student)
    {
        $student->delete();
        session()->flash("success", "Siswa berhasil dihapus");
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function resetField()
    {
        $this->student_id = "";
        $this->username = "";
        $this->password = "";
        $this->school_id = "";
        $this->school_name = "";
        $this->name = "";
        $this->gender = "";
        $this->student_edit_id = "";
    }

    function setField(Student $student)
    {
        $this->student_id = $student->id;
        $this->username = $student->username;
        $this->password = $student->password;
        $this->school_id = $student->school_id;
        $this->school_name = $student->school->school_name;
        $this->name = $student->name;
        $this->gender = $student->gender;
    }
}
