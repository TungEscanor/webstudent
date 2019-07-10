<?php

namespace App\Http\Controllers;

use App\Http\Requests\classRequest;
use App\Models\Classes;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassController extends Controller
{
    //show classes list
    public function index()
    {
        $classes = Classes::paginate(8);
        $data = array();
        $data['classes'] = $classes;
        return view('class.index',$data);
    }
    //show form create class
    public function create()
    {
        $class = new Classes();
        $faculties = Faculty::all();
        $data = array();
        $data['faculties'] = $faculties;
        $data['classes'] = $class;
        return view('class.create', $data);
    }

    //save new class
    public function store(ClassRequest $request)
    {
        $this-> insertOrUpdate($request);
        return redirect('/class');
    }

    public function edit($id)
    {
        $faculties = Faculty::all();
        $class = Classes::find($id);

        $data = array();
        $data['class'] = $class;
        $data['faculties'] = $faculties;

        return view('class.update',$data);
    }

    public function update(ClassRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
        return redirect('/class');
    }

    public function insertOrUpdate($request, $id='')
    {
        $class = new Classes();
        if($id)
        {
            $class = Classes::find($id);
        }

        $class ->name = $request->name;
        $class-> faculty_id = $request->faculty_id;

        $class ->save();
    }

    public function delete($id)
    {
        $class = Classes::find($id);
        return view('class.delete',compact('class'));
    }

    public function destroy($id)
    {
        $class = Classes::find($id)->delete();
        return redirect('/class');
    }
}
