<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class AjaxStudentController extends Controller
{
    public function edit($id) {
        $student = Student::find($id);
        $student->avatar_form = asset(pare_url_file($student ->avatar));
        $student->birthday_form = date('Y-m-d',strtotime($student->birthday));
        return Response::json($student);
    }

    public function update(Request $request) {

        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $file = upload_image('avatar');

            if (isset($file['name'])) {

                $data['avatar'] = $file['name'];
            }
        }
        $student = Student::find($request->student_id);

       $student->update($request->all());

       return Response::json($student);
    }
}
