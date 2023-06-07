<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.school.index", [
            "title" =>"Sekolah",
            "schools" => School::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdiated = $request->validate([
            "school_name" => "required|string",
            "school_category" => "required|in:SMP,SMA",
        ]);
        School::create($valdiated);
        return back()->with("success", "Sekalah berhasil di tambahkan");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $valdiated = $request->validate([
            "school_name" => "required|string",
            "school_category" => "required|in:SMP,SMA",
        ]);
        $school->update($valdiated);
        return back()->with("success", "Sekolah berhasil di perbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        return back()->with("success", "Sekolah berhasil di hapus");
    }
}
