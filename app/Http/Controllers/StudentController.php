<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Repositories\Student\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
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
        $students = $this->studentRepository->getAllList();
        return view('students.create', compact('students'));
    }

    public function store(StudentRequest $request)
    {
        $this->studentRepository->store($request);
        return redirect('students')->with('success', 'Create student successfully');
    }


    public function edit($id)
    {
        $students = $this->studentRepository->getAllList();
        $item = $this->studentRepository->getListById($id);
        return view('students.update', compact('item'), compact('students'));
    }


    public function update($id, StudentRequest $request)
    {
        $image = $this->studentRepository->getFileUrl($request);

        if (!empty($image)) {
            $request->avatar = $image;
        }

        $this->studentRepository->update($id, $request->all());
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
        return back()->with('warning', 'Delete student successfully');
    }

    public function show($id)
    {
        $students = $this->studentRepository->getListById($id);
        return view('subjects.mark', compact('students'));
    }
}
