<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        $data = array();
        $data['students'] = $students;
        return view('student.index',$data);
    }
}
