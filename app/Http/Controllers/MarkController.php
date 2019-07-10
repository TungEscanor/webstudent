<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Http\Requests\MarkRequest;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    //show mark list
    public function index()
    {
        $marks = Mark::paginate(8);
        $data = array();
        $data['marks'] = $marks;
        return view('mark.index',$data);
    }
    //show form create mark
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $mark = new Mark();
        $data = array();
        $data['students'] = $students;
        $data['subjects'] = $subjects;
        $data['mark'] = $mark;
        return view('mark.create', $data);
    }

    //save new mark
    public function store(MarkRequest $request)
    {
        $this-> insertOrUpdate($request);
        return redirect('/mark');
    }

    public function edit($id)
    {
        $students = Student::all();
        $subjects = Subject::all();
        $mark = Mark::find($id);
        $data = array();
        $data['students'] = $students;
        $data['subjects'] = $subjects;
        $data['mark'] = $mark;

        return view('mark.update',$data);
    }

    public function update(MarkRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
        return redirect('/mark');
    }

    public function insertOrUpdate($request, $id='')
    {
        $mark = new Mark();
        if($id)
        {
            $class = Mark::find($id);
        }

        $mark ->student_id = $request->student_id;
        $mark-> subject_id = $request->subject_id;
        $mark-> mark = $request->mark;


        $mark ->save();
    }

    public function delete($id)
    {
        $mark = Mark::find($id);
        return view('mark.delete',compact('mark'));
    }

    public function destroy($id)
    {
        $mark = Mark::find($id)->delete();
        return redirect('/mark');
    }
}
