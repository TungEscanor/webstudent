<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;


class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getAllList();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $faculties = $this->subjectRepository->showFaculties();
        return view('subjects.create',compact('faculties'));
    }

    public function store(SubjectRequest $request)
    {

        $this->subjectRepository->store($request->all());
        return redirect('subjects')->with('success', 'Create subject successfully');
    }


    public function edit($id)
    {
        $faculties = $this->subjectRepository->showFaculties();
        $subject = $this->subjectRepository->getListById($id);
        return view('subjects.edit', compact('subject'), compact('faculties'));
    }

    public function update($id, SubjectRequest $request)
    {
        if ($this->subjectRepository->getListById($id)->name == $request->name
            && $this->subjectRepository->getListById($id)->faculty_id == $request->faculty_id) {
            return redirect('subjects')->with('info', 'Nothing was changed !');
        } else {
            $this->subjectRepository->update($id, $request->all());
            return redirect('subjects')->with('success', 'Update subject successfully');
        }
    }

    public function delete($id)
    {
        $subject = $this->subjectRepository->getListById($id);
        return view('subjects.delete', compact('subject'));
    }

    public function destroy($id)
    {
        $this->subjectRepository->destroy($id);
        return back()->with('success', 'Delete subject successfully');
    }

    public function show($id)
    {
        $marks = $this->subjectRepository->showMarks($id);
        return view('subjects.showMarks', compact('marks'));
    }
}
