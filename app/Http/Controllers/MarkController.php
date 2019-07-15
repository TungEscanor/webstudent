<?php

namespace App\Http\Controllers;
use App\Http\Requests\MarkRequest;
use App\Repositories\Mark\MarkRepositoryInterface;


class MarkController extends Controller
{
    protected $markRepository;

    public function __construct(MarkRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }


    public function index()
    {
        $marks = $this->markRepository->getAllList();
        return view('marks.index',compact('marks'));
    }

    public function create()
    {
        $data = $this->markRepository->showStudentAndMark();
        $marks = $this->markRepository->getAllList();
        return view('marks.create',compact('data'),compact('marks'));
    }

    public function store(MarkRequest $request)
    {

        $this->markRepository->store($request->all());
        return redirect('marks')->with('success','Create mark successfully');
    }


    public function edit($id)
    {
        $data = $this->markRepository->showStudentAndMark();
        $mark = $this->markRepository->getListById($id);
        return view('marks.edit',compact('data'),compact('mark'));
    }


    public function update($id,MarkRequest $request )
    {
        $this->markRepository->update($id,$request->all());
        return redirect('marks')->with('success','Update mark successfully');
    }

    public function destroy($id)
    {
        $this->markRepository->destroy($id);
        return back()->with('warning','Delete mark successfully');
    }

}
