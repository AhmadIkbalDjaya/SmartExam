<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  index()
    {
        return view("login", [
            "title" => "Login CBT",
        ]);
    }

    public function  login(Request $request)
    {
        // // Cek login pada guard "user" dengan pengecekan hash password
        // if (Auth::guard('user')->attempt(["username" => $username, "password" => $password])) {
        //     return redirect()->route('admin.home.index');
        // }

        // // Cek login pada guard "teacher" tanpa pengecekan hash password
        // $teacher = Teacher::where('username', $username)->first();
        // if ($teacher && $teacher->password === $password) {
        //     Auth::guard('teacher')->login($teacher);
        //     return redirect()->route('teacher.home.index');
        // }

        // // Cek login pada guard "student" tanpa pengecekan hash password
        // $student = Student::where('username', $username)->first();
        // if ($student && $student->password === $password) {
        //     Auth::guard('student')->login($student);
        //     return redirect()->route("student.home.index");
        // }
        if (Auth::guard('student')->attempt(["username" => $request->username, "password" => $request->password])) {
            return redirect()->route("student.home.index");
        } elseif (Auth::guard('teacher')->attempt(["username" => $request->username, "password" => $request->password])) {
            return redirect()->route('teacher.home.index');
        } elseif (Auth::guard('user')->attempt(["username" => $request->username, "password" => $request->password])) {
            return redirect()->route('admin.home.index');
        }
        return redirect()->route('login')->with('loginError', "Username / Password salah");
    }

    public function logout(Request $request)
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        } elseif (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        Auth::logout();
        $request->session()->invalidate();  
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}
