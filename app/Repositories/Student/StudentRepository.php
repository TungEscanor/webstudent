<?php

namespace App\Repositories\Student;

use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;
use function foo\func;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    protected $class;
    protected $mark;

    public function __construct(Student $student, ClassModel $class, Mark $mark)
    {
        parent::__construct($student);
        $this->class = $class;
        $this->mark = $mark;
    }

    public function getAllList()
    {
        return $this->model->paginate(8);
    }

    public function showClasses()
    {
        return $this->class->all()->pluck('name', 'id');
    }

    public function showMarks($id)
    {
        return $this->mark->where('student_id', $id)->paginate(8);
    }

    public function checkAvatar($avatar)
    {
        return $this->model->where('avatar', $avatar);
    }

    public function searchStudent($data)
    {
        if(isset($data['min_age']) && isset($data['max_age'])) {
        $min = Carbon::now()->subYears($data['min_age']);
        $max = Carbon::now()->subYears($data['max_age']);
        $students = $this->model->whereBetween('birthday', [$max, $min]);
            if (!empty($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number','regexp', $phone);
                    }
                });
            }
        }
        else {
        $students = $this->model->query();
        if (!empty($data['phones'])) {
            $students->where(function ($query) use ($data) {
                foreach ($data['phones'] as $key => $phone) {
                    $query->orWhere('phone_number','regexp', $phone);
                }
            });
        }}
        $result = $students->paginate(8);

        return $result;
    }
}

?>