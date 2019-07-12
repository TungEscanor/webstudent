<?php

namespace App\Http\Controllers;
use App\Faculty;

use App\Http\Requests\FacultyRequest;
use Illuminate\Http\Request;
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
        $faculty = $this->facultyRepository->getAllList();
        return view('faculty.index',compact('faculty'));
    }

    public function create()
    {
        return view('faculty.create');
    }

    public function store(FacultyRequest $request)
    {
        $this->facultyRepository->store($request->all());
        return redirect('faculty')->with('success','Create faculty successfully');
    }


    public function edit($id)
    {
      $faculty =  $this->facultyRepository->getListById($id);
      return view('faculty.update',compact('faculty'));
    }


    public function update($id,FacultyRequest $request )
    {
        $this->facultyRepository->update($id,$request->all());
        return redirect('faculty')->with('success','Update faculty successfully');
    }

    public function delete($id) {
      $faculty = $this->facultyRepository->getListById($id);
      return view('faculty.delete',compact('faculty'));
    }

    public function destroy($id)
    {
        $this->facultyRepository->destroy($id);
        return redirect('faculty')->with('warning','Delete faculty successfully');
    }
}
