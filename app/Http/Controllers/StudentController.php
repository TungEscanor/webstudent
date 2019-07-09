<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    //show students list
    public function index()
    {
        $students = DB::table('students')->paginate(8);
        $data = array();
        $data['students'] = $students;
        return view('student.index',$data);
    }
    //show form create student
    public function create()
    {
        $students = new Student();
        $classes = Classes::all();
        $data = array();
        $data['students'] = $students;
        $data['classes'] = $classes;
        return view('student.create');
    }

    //save new student
    public function store(StudentRequest $request)
    {
        $this-> insertOrUpdate($request);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.update',$student);
    }

    public function update(StudentRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
    }

    public function insertOrUpdate($request, $id='')
    {
        $student = new Student();
        if($id)
        {
            $student = Student::find($id);
        }

        $student ->name = $request->name;
        $student-> class_id = $request->class_id;
        $student->birthday = $request->birthday;
        $student->gender = $request -> gender;

        if($request-> hasFile('avatar'))
        {
            $file = $request->avatar;
            $fileExtention = $file-> getClientOriginalExtension();
            $fileName = Str::slug($request->name).'.'.$fileExtention;
            $uploadPath = public_path('/upload');

            $file->move($uploadPath,$fileName);
        }
        $student->avatar = '/upload/'.$fileName;

        $student ->save();
    }

    public function delete($id)
    {
        $student = Student::find($id);
        return view('student.delete',compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::find($id)->delete();
    }
}
