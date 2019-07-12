<?php
namespace App\Repositories\Student;

use App\Http\Requests\StudentRequest;
use App\Mark;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentRepository  implements  StudentRepositoryInterface {
    protected $model;
    public function __construct(Student $student){
        $this->model = $student;
    }
    public function getAllList(){
        return $this->model->paginate(8);
    }
    public function getListById($id){
        return $this->model->findOrFail($id);
    }

    public function store(StudentRequest $request) {
        $student = new Student();

        $student ->name = $request->name;
        $student-> specialty_id = $request->specialty_id;
        $student->birthday = $request->birthday;
        $student->gender = $request -> gender;

        if($request-> hasFile('avatar'))
        {
            $file = $request->avatar;
            $fileExtention = $file-> getClientOriginalExtension();
            $fileName = Str::slug($request->name).'.'.$fileExtention;
            $uploadPath = public_path('/upload');

            $file->move($uploadPath,$fileName);

            $student->avatar = '/upload/'.$fileName;
        }

        $student ->save();

    }

    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);

        $student ->name = $request->name;
        $student-> specialty_id = $request->specialty_id;
        $student->birthday = $request->birthday;
        $student->gender = $request -> gender;

        if($request-> hasFile('avatar'))
        {
            $file = $request->avatar;
            $fileExtention = $file-> getClientOriginalExtension();
            $fileName = Str::slug($request->name).'.'.$fileExtention;
            $uploadPath = public_path('/upload');

            $file->move($uploadPath,$fileName);

            $student->avatar = '/upload/'.$fileName;
        }

        $student ->save();


    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if(File::exists(public_path($student->avatar))) {
            File::delete(public_path($student->avatar));
        }

        $student->delete();
    }

    public function showMark($id){
        $marks = Mark::where('student_id',$id)->paginate(8);
        return $marks;
    }
}
?>