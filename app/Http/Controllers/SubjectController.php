<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Mark;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //show subjects list
    public function index()
    {
        $subjects = DB::table('subjects')->paginate(8);
        $data = array();
        $data['subjects'] = $subjects;
        return view('subject.index',$data);
    }
    //show form create Subject
    public function create()
    {
        $subjects = new Subject();
        $data = array();
        $data['subjects'] = $subjects;
        return view('subject.create');
    }

    //save new Subject
    public function store(SubjectRequest $request)
    {
        $this-> insertOrUpdate($request);
        return redirect('/subject');
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subject.update',compact('subject'));
    }

    public function update(SubjectRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
        return redirect('/subject');
    }

    public function insertOrUpdate($request, $id='')
    {
        $subject = new Subject();
        if($id)
        {
            $subject = Subject::find($id);
        }

        $subject ->name = $request->name;

        $subject ->save();
    }

    public function mark($id)
    {
        $marks = Mark::where('subject_id',$id)->paginate(8);

        $data = array();
        $data['marks'] = $marks;
        return view('subject.mark',$data);
    }

    public function delete($id)
    {
        $subject = Subject::find($id);
        return view('subject.delete',compact('subject'));
    }

    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();
        return redirect('/subject');
    }
}
