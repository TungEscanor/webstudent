<?php

namespace App\Http\Controllers;
use App\Http\Requests\FacultyRequest;
use App\Repositories\Faculty\FacultyRepositoryInterface;

class FacultyController extends Controller
{
    protected $facultyRepository;

    public function __construct(FacultyRepositoryInterface $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    public function index()
    {
        $faculties = $this->facultyRepository->getAllList();
        return view('faculties.index',compact('faculties'));
    }

    public function create()
    {
        return view('faculties.create');
    }

    public function store(FacultyRequest $request)
    {
        $this->facultyRepository->store($request->all());
        return redirect('faculties')->with('success','Create faculty successfully !');
    }


    public function edit($id)
    {
      $faculty =  $this->facultyRepository->getListById($id);
      return view('faculties.edit',compact('faculty'));
    }

    public function update($id,FacultyRequest $request )
    {
        if($this->facultyRepository->getListById($id)->name == $request->name ) {
            return redirect('faculties')->with('info', 'Nothing was changed !');
        }

        else {
            $this->facultyRepository->update($id, $request->all());
            return redirect('faculties')->with('success', 'Update faculty successfully !');
        }
    }

    public function destroy($id)
    {

        $this->facultyRepository->destroy($id);
        return back()->with('success','Delete faculty successfully !');
    }

    public function show($id) {
        $classes = $this->facultyRepository->showClasses($id);
        return view('faculties.showClasses',compact('classes'));
    }
}
