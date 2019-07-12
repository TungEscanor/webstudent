<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Mark;
use App\Repositories\Mark\MarkRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    protected $markRepository;

    public function __construct(MarkRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }


    public function index()
    {
        $mark = $this->markRepository->getAllList();
        return view('mark.index',compact('mark'));
    }

    public function create()
    {
        $mark = $this->markRepository->getAllList();
        return view('mark.create',compact('mark'));
    }

    public function store(MarkRequest $request)
    {

        $this->markRepository->store($request->all());
        return redirect('mark')->with('success','Create mark successfully');
    }


    public function edit($id)
    {
        $mark = $this->markRepository->getAllList();
        $item =  $this->markRepository->getListById($id);
        return view('mark.update',compact('item'),compact('mark'));
    }


    public function update($id,MarkRequest $request )
    {
        $this->markRepository->update($id,$request->all());
        return redirect('mark')->with('success','Update mark successfully');
    }

    public function delete($id) {
        $mark = $this->markRepository->getListById($id);
        return view('mark.delete',compact('mark'));
    }

    public function destroy($id)
    {
        $this->markRepository->destroy($id);
        return redirect('mark')->with('warning','Delete mark successfully');
    }

}
