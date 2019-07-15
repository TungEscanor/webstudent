<?php

namespace App\Repositories\Student;
use App\Models\Student;
use App\Repositories\Base\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{

    public function __construct(Student $student)
    {
        parent::__construct($student);
    }

    public function store($request)
    {
//        $student = new Student();
//
//        $data = $request->all();
//
//        if ($request->hasFile('avatar')) {
//            $data['avatar'] = $this->getFileUrl($request);
//        }
//
//        $student->save($data);

    }

    public function destroy($id)
    {
//        $student = $this->model->find($id);
//
//        if (File::exists(public_path($student->avatar))) {
//            File::delete(public_path($student->avatar));
//        }
//
//        $student->delete();
    }

    /**
     * @param $request
     * @return string
     */
//    public function getFileUrl($request)
//    {
//        if($request->avatar) {
//            $request = $request->avatar;
//            $fileExtention = $request->getClientOriginalExtension();
//            $fileName = time() . '.' . $fileExtention;
//            $uploadPath = public_path('/upload');
//
//            $request->move($uploadPath, $fileName);
//
//            return sprintf('/upload/%s', $fileName);
//        }
//
//        return '';
//    }
}

?>