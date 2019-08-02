<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Subject\SubjectRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $classRepository;
    protected $subjectRepository;

    public function __construct(StudentRepository $studentRepository,ClassRepository $classRepository,SubjectRepository $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->classRepository = $classRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $subjects = $this->subjectRepository->getAllList();
        $students = $this->studentRepository->searchStudent($data);
        return view('students.index',compact('students','data','subjects'));
    }

    public function create()
    {
        $classes = $this->classRepository->getAllList()->pluck('name','id');
        return view('students.create', compact('classes'));
    }

    public function store(StudentRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('avatar')) {

            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $data['avatar'] = $file['name'];
            }
        }
        $this->studentRepository->store($data);
        return redirect($request->redirects_to)->with('success', 'Create student successfully');
    }

    public function edit($id)
    {
        $classes = $this->classRepository->getAllList()->pluck('name','id');
        $student = $this->studentRepository->getListById($id);
        return view('students.edit', compact('student'),compact('classes'));
    }

    public function update($id, StudentRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $file = upload_image('avatar');

            if (isset($file['name'])) {

            $data['avatar'] = $file['name'];
            }
        }
        $this->studentRepository->update($id, $data);
        return redirect($request->redirects_to)->with('success', 'Update student successfully');
    }

    public function delete($id)
    {
        $student = $this->studentRepository->getListById($id);
        return view('students.delete', compact('student'));
    }

    public function destroy($id)
    {
        $student = $this->studentRepository->getListById($id);
        $this->studentRepository->destroy($id);
        if(!empty($student->avatar)) {
            if(empty($this->studentRepository->checkAvatar($student->avatar))) {
            unlink(public_path(pare_url_file($student->avatar)));}}

        return back()->with('success', 'Delete student successfully');
    }

    public function search(Request $request) {

    }

    public function show($id)
    {
        $student = $this->studentRepository->getListById($id);
        $marks = $student->marks()->paginate($this->paginate);
        return view('students.showMarks', compact('marks'),['id'=>$id]);
    }

    public function createMarks($id) {
        $student = $this->studentRepository->getListById($id);
        $subjects = $this->subjectRepository->getAllList()->pluck('name','id');
        $marks = $student->marks()->get();
        return view('students.createMark',compact('subjects','student','marks'));
    }

    public function badStudents() {
        $students = $this->studentRepository->badStudents();
        return view('students.sendEmail')->with(compact('students'));
    }
}
