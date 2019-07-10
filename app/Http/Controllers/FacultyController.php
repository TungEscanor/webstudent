<?php

namespace App\Http\Controllers;

use App\Http\Requests\facultyRequest;
use App\Models\Classes;
use App\Models\faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    //show faculties list
    public function index()
    {
        $faculties = DB::table('faculties')->paginate(8);
        $data = array();
        $data['faculties'] = $faculties;
        return view('faculty.index',$data);
    }
    //show form create faculty
    public function create()
    {
        $faculties = new Faculty();
        $data = array();
        $data['faculties'] = $faculties;
        return view('faculty.create');
    }

    //save new faculty
    public function store(FacultyRequest $request)
    {
        $this-> insertOrUpdate($request);
        return redirect('/faculty');
    }

    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('faculty.update',compact('faculty'));
    }

    public function update(FacultyRequest $request,$id)
    {
        $this->insertOrUpdate($request,$id);
        return redirect('/faculty');
    }

    public function insertOrUpdate($request, $id='')
    {
        $faculty = new Faculty();
        if($id)
        {
            $faculty = Faculty::find($id);
        }

        $faculty ->name = $request->name;

        $faculty ->save();
    }

    public function delete($id)
    {
        $faculty = Faculty::find($id);
        return view('faculty.delete',compact('faculty'));
    }

    public function destroy($id)
    {
        $faculty = Faculty::find($id)->delete();
        return redirect('/faculty');
    }
}
