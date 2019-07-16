<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Repositories\Student\StudentRepository;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->getAllList();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = $this->studentRepository->showClasses();
        return view('students.create', compact('classes'));
    }

    public function store(StudentRequest $request)
    {
        $this->studentRepository->store($request->all());
        return redirect('students')->with('success', 'Create student successfully');
    }


    public function edit($id)
    {
        $classes = $this->studentRepository->showClasses();
        $student = $this->studentRepository->getListById($id);
        return view('students.edit', compact('student'), compact('classes'));
    }


    public function update($id,StudentRequest $request)
    {
        $this->studentRepository->update($id,$request->all());
        return redirect('students')->with('success', 'Update student successfully');
    }

    public function delete($id)
    {
        $student = $this->studentRepository->getListById($id);
        return view('students.delete', compact('student'));
    }

    public function destroy($id)
    {
        $this->studentRepository->destroy($id);
        return back()->with('success', 'Delete student successfully');
    }

    public function show($id)
    {
        $marks = $this->studentRepository->showMarks($id);
        return view('students.showMarks', compact('marks'));
    }
}
