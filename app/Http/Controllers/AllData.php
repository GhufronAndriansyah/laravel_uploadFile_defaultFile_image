<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;


class AllData extends Controller
{
    public function index()
    {
        // $students = Student::withTrashed()->get();
        $students = Student::all();
        return view('mahasiswa.index',compact('students'));
    }
    public function trash()
    {
        $students = Student::onlyTrashed()->get();
        return view('students.trash',compact('students'));
    }
}
