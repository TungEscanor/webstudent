<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Requests\SpecialtyRequest;
use App\Repositories\Specialty\SpecialtyRepositoryInterface;
use App\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialtyController extends Controller
{
    protected $specialtyRepository;

    public function __construct(SpecialtyRepositoryInterface $specialtyRepository)
    {
        $this->specialtyRepository = $specialtyRepository;
    }

    public function index()
    {
        $specialty = $this->specialtyRepository->getAllList();
        return view('specialty.index',compact('specialty'));
    }

    public function create()
    {
        $specialty = $specialty = $this->specialtyRepository->getAllList();
        return view('specialty.create',compact('specialty'));
    }

    public function store(SpecialtyRequest $request)
    {
        $this->specialtyRepository->store($request->all());
        return redirect('specialty')->with('success','Create specialty successfully');
    }


    public function edit($id)
    {
        $specialty = $this->specialtyRepository->getAllList();
        $item =  $this->specialtyRepository->getListById($id);
        return view('specialty.update',compact('item'),compact('specialty'));
    }


    public function update($id,SpecialtyRequest $request )
    {
        $this->specialtyRepository->update($id,$request->all());
        return redirect('specialty')->with('success','Update specialty successfully');
    }

    public function delete($id) {
        $specialty = $this->specialtyRepository->getListById($id);
        return view('specialty.delete',compact('specialty'));
    }

    public function destroy($id)
    {
        $this->specialtyRepository->destroy($id);
        return redirect('specialty')->with('warning','Delete specialty successfully');
    }
}
