<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
       $subject = $this->subjectRepository->getAllList();
        return view('subject.index',compact('subject'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(SubjectRequest $request)
    {
        $this->subjectRepository->store($request->all());
        return redirect('subject')->with('success','Create subject successfully');
    }


    public function edit($id)
    {
       $subject =  $this->subjectRepository->getListById($id);
        return view('subject.update',compact('subject'));
    }


    public function update($id,SubjectRequest $request )
    {
        $this->subjectRepository->update($id,$request->all());
        return redirect('subject')->with('success','Update subject successfully');
    }

    public function delete($id) {
       $subject = $this->subjectRepository->getListById($id);
        return view('subject.delete',compact('subject'));
    }

    public function destroy($id)
    {
        $this->subjectRepository->destroy($id);
        return redirect('subject')->with('warning','Delete subject successfully');
    }

    public function showMark($id){
        $mark = $this->subjectRepository->showMark($id);
        return view('subject.mark',compact('mark'));
    }
}
