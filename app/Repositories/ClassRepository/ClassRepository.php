<?php
namespace App\Repositories\ClassRepository;
use App\Models\ClassModel;
use App\Models\Faculty;
use App\Models\Student;
use App\Repositories\Base\BaseRepository;


class ClassRepository extends BaseRepository implements ClassRepositoryInterface {
    protected $student;
    protected $faculty;
    public function __construct(ClassModel $classModel, Student $student, Faculty $faculty){
        parent::__construct($classModel);
        $this->student= $student;
        $this->faculty = $faculty;
    }

    public function showStudents($id) {
        return $this->student->where('class_id',$id)->paginate(8);
    }

    public function showFaculties() {
        return $this->faculty::all()->pluck('name','id');
    }
}
?>