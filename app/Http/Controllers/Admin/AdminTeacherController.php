<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.teacher.index", [
            "title" => "Guru Sekolah",
        ]);
    }
}
