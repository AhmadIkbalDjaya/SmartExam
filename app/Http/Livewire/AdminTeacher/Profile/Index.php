<?php

namespace App\Http\Livewire\AdminTeacher\Profile;

use App\Models\Teacher;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (Auth::guard('teacher')->check()) {
            $user = Teacher::find(Auth::guard('teacher')->user()->id);
        } elseif(Auth::guard('user')->check()) {
            $validated["password"] = Hash::make($validated["password"]);
            $user = User::find(Auth::guard('user')->user()->id);
        }
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
