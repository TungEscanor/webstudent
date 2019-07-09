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
        $classes = DB::table('classes')->paginate(8);
        $data = array();
        $data['classes'] = $classes;
        return view('class.index',$data);
    }
    //show form create class
    public function create()
    {
        $faculties = new Classes();
        $classes = Faculty::all();
        $data = array();
        $data['faculties'] = $faculties;
        $data['classes'] = $classes;
        return view('class.create', $data);
    }

    //save new class
    public function store(ClassRequest $request)
    {
        $this-> insertOrUpdate($request);
    }

    public function edit($id)
    {
        $class = Classes::find($id);
        return view('class.update',$class);
    }

    public function update(ClassRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
    }

    public function insertOrUpdate($request, $id='')
    {
        $class = new Classes();
        if($id)
        {
            $class = Classes::find($id);
        }

        $class ->name = $request->name;
        $class-> class_id = $request->class_id;
        $class->birthday = $request->birthday;
        $class->gender = $request -> gender;


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
    }
}
