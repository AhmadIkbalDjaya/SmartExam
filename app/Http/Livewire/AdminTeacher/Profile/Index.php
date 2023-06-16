<?php

namespace App\Http\Livewire\AdminTeacher\Profile;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $password, $password_confirmation;

    public function render()
    {
        return view('livewire.admin-teacher.profile.index');
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
            "password" => "required|min:8|confirmed"
        ]);
        // if (auth()->user()) {
        //     $user = auth()->user();
        //     $user->update($validated);
        // } else {
        //     $teacher = auth()->teacher();
        //     $teacher->update($validated);
        // }
        $user = User::find(1);
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
