<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $student = $this->studentRepository->getAllList();
        return view('student.index',compact('student'));
    }

    public function create()
    {
        $student  = $this->studentRepository->getAllList();
        return view('student.create',compact('student'));
    }

    public function store(StudentRequest $request)
    {
        $this->studentRepository->store($request);
        return redirect('student')->with('success','Create student successfully');
    }


    public function edit($id)
    {
        $student = $this->studentRepository->getAllList();
        $item =  $this->studentRepository->getListById($id);
        return view('student.update',compact('item'),compact('student'));
    }


    public function update($id,StudentRequest $request )
    {
        $this->studentRepository->update($id,$request);
        return redirect('student')->with('success','Update student successfully');
    }

    public function delete($id) {
        $student = $this->studentRepository->getListById($id);
        return view('student.delete',compact('student'));
    }

    public function destroy($id)
    {
        $this->studentRepository->destroy($id);
        return redirect('student')->with('warning','Delete student successfully');
    }

    public function showMark($id){
        $mark = $this->studentRepository->showMark($id);
        return view('subject.mark',compact('mark'));
    }
}
