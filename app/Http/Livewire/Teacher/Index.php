<?php

namespace App\Http\Livewire\Teacher;

use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class Index extends Component
{
    public $teacher_id, $username, $password, $school_id, $school_name;
    public $teacher_edit_id;

    public function render()
    {
        return view('livewire.teacher.index', [
            "teachers" => Teacher::latest()->get(),
            "schools" => School::latest()->get(),
        ]);
    }

    function updated($fields)
    {
        $this->validateOnly($fields, [
            "username" => "required|unique:teachers,username," . $this->teacher_edit_id . "",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            "username" => "required|unique:teachers,username",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
        ]);

        Teacher::create($validated);
        session()->flash("success", "Guru berhasil ditambahkan");
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function edit(Teacher $teacher)
    {
        $this->teacher_edit_id = $teacher->id;
        $this->setField($teacher);
    }

    function update(Teacher $teacher)
    {
        $validated = $this->validate([
            "username" => "required|unique:teachers,username,$teacher->id",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
        ]);
        $teacher->update($validated);
        session()->flash("success", "Guru berhasil di perbaharui");
        $this->teacher_edit_id = '';
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function destroy(Teacher $teacher)
    {
        $teacher->delete();
        session()->flash("success", "Guru berhasil dihapsu");
        $this->resetField();
        $this->dispatchBrowserEvent('close-modal');
    }

    function resetField()
    {
        $this->teacher_id = '';
        $this->username = '';
        $this->password = '';
        $this->school_id = '';
        $this->school_name = '';
        $this->teacher_edit_id = '';
    }

    function setField(Teacher $teacher)
    {
        $this->teacher_id = $teacher->id;
        $this->username = $teacher->username;
        $this->password = $teacher->password;
        $this->school_id = $teacher->school->id;
        $this->school_name = $teacher->school->school_name;
    }
}
