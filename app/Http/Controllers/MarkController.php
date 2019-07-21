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
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $data = $this->markRepository->showStudentAndSubject();
        return view('marks.create', compact('data'));
    }

    public function store(MarkRequest $request)
    {
        $data = $request->all();
        $result= [];
        foreach($data as $key => $value) {

        }
        dd($result);
        $check = $this->markRepository->checkStudentAndSubject($result);
        if (isset($check->id)) {
            $this->markRepository->update($check->id, $result);
        } else {
            $this->markRepository->store($result);

        }
        return redirect($request->redirects_to)->with('success', 'Done !');
    }


    public function edit($id)
    {
        $data = $this->markRepository->showStudentAndSubject();
        $mark = $this->markRepository->getListById($id);
        return view('marks.edit', compact('data'), compact('mark'));
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
