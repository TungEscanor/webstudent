<?php

namespace App\Repositories\Student;
use App\Http\Requests\StudentRequest;
use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Repositories\Base\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    protected $class;
    protected $mark;
    public function __construct(Student $student, ClassModel $class,Mark $mark)
    {
        parent::__construct($student);
        $this->class=$class;
        $this->mark=$mark;
    }

    public function getAllList()
    {
        return $this->model->paginate(8);
    }

    public function showClasses()
    {
        return $this->class->all()->pluck('name','id');
    }

    public function showMarks($id) {
        return $this->mark->where('student_id',$id)->paginate(8);
    }

}

?>