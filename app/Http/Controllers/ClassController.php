<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClassRequest;
use App\Repositories\ClassRepository\ClassRepositoryInterface;

class ClassController extends Controller
{
    protected $classRepository;

    public function __construct(ClassRepositoryInterface $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function index()
    {
        $classes = $this->classRepository->getAllList();
        return view('classes.index',compact('classes'));
    }

    public function create()
    {
        $faculties = $this->classRepository->showFaculties();
        return view('classes.create',compact('faculties'));
    }

    public function store(ClassRequest $request)
    {
        $this->classRepository->store($request->all());
        return redirect('classes')->with('success','Create class successfully');
    }


    public function edit($id)
    {
        $faculties = $this->classRepository->showFaculties();
        $class =  $this->classRepository->getListById($id);
        return view('classes.edit',compact('class'),compact('faculties'));
    }


    public function update($id,ClassRequest $request )
    {
        if($this->classRepository->getListById($id)->name == $request->name
            && $this->classRepository->getListById($id)->faculty_id ==$request->faculty_id) {
            return redirect('classes')->with('info', 'Nothing was changed !');
        }
        else {
        $this->classRepository->update($id,$request->all());
        return redirect('classes')->with('success','Update class successfully');}
    }

    public function destroy($id)
    {
        $this->classRepository->destroy($id);
        return back()->with('warning','Delete class successfully');
    }

    public function show($id){
        $students = $this->classRepository->showStudents($id);
        return view('classes.showStudents',compact('students'));
    }
}
