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

    public function checkStudentAndSubject($request)
    {
        return $this->model->where('student_id', $request->student_id)
            ->where('subject_id', $request->subject_id)->first();

    }

    

}

?>