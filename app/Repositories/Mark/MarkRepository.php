<?php

namespace App\Repositories\Mark;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\Base\BaseRepository;

class MarkRepository extends BaseRepository implements MarkRepositoryInterface
{
    protected $student;
    protected $subject;

    public function __construct(Mark $mark, Student $student, Subject $subject)
    {
        parent::__construct($mark);
        $this->subject = $subject;
        $this->student = $student;
    }

    public function getAllList()
    {
        return $this->model->orderBy('student_id')->paginate(8);
    }

    public function showStudentAndSubject()
    {
        $students = $this->student->all()->pluck('name', 'id');

        $subject = $this->subject->all()->pluck('name', 'id');

        $data = [];

        $data['students'] = $students;
        $data['subjects'] = $subject;

        return $data;
    }

    public function checkStudentAndSubject($data)
    {
       $result = [];
       if(!empty($data)) {
               foreach ($data as $key => $value) {
                $check =  $this->model->orwhere([['student_id',$value['student_id']],['subject_id',$value['subject_id']]])
                    ->first();

                if(isset($check)) {
                    $check->mark = $value['mark'];
                    array_push($result,$check->toArray());
                }
               }
       }
       return $result;
    }
}

?>