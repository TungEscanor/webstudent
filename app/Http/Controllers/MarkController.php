<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Mark\MarkRepositoryInterface;
use App\Repositories\Student\StudentRepository;
use function foo\func;


class MarkController extends Controller
{
    protected $markRepository;
    protected $studentRepository;
    protected $classRepository;

    public function __construct(MarkRepositoryInterface $markRepository,StudentRepository $studentRepository,ClassRepository $classRepository)
    {
        $this->markRepository = $markRepository;
        $this->studentRepository = $studentRepository;
        $this->classRepository = $classRepository;
    }

    public function index()
    {
        $marks = $this->markRepository->getAllList();
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $data = $this->markRepository->showStudentAndSubject();
        return view('marks.create', compact('data'));
    }

    public function store(MarkRequest $request)
    {
        $data = [];
        if (count($request->student_id) > 0) {
            foreach ($request->student_id as $item => $value) {
                array_push($data, [
                    'subject_id' => $request->subject_id[$item],
                    'student_id' => $request->student_id[$item],
                    'mark' => $request->mark[$item],
                ]);
            }
        }

        $check = $this->markRepository->checkStudentAndSubject($data);
        if (!empty($check)) {



            foreach ($check as $value) {
                $this->markRepository->update($value['id'],$value);
            }

            foreach ($diff as $value) {
                $this->markRepository->store($value);
            }
        } else {
            foreach ($data as $key => $value) {
                $this->markRepository->store($value);
            }
        }
        return redirect($request->redirects_to)->with('success', 'Done !');
    }

    public function edit($id)
    {
        $mark = $this->markRepository->getListById($id);
        $student = $this->studentRepository->getListById($mark->student_id);
        $class_id = $student->class_id;
        $class = $this->classRepository->getListById($class_id);
        $subjects = Subject::where('faculty_id', $class->faculty_id)
            ->orWhereHas('faculty', function ($query) {
                $query->where('name', 'Khoa cơ bản');
            })->pluck('name','id');
        return view('marks.edit', compact('subjects'), compact('mark'));
    }


    public function update($id, MarkRequest $request)
    {

    }

    public function destroy($id)
    {
        $this->markRepository->destroy($id);
        return back()->with('success', 'Delete mark successfully');
    }


}
