<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    public function __construct(Student $student)
    {
        parent::__construct($student);

    }

    public function checkAvatar($avatar)
    {
        return $this->model->where('avatar', $avatar);
    }

    public function searchStudent($data)
    {
        $students = $this->model->with('classRelation');

        if (!empty($data['min_age'])) {
            $min = Carbon::now()->subYears($data['min_age']);
            $students->where('birthday', '<=', $min);
        }

        if (!empty($data['max_age'])) {
            $max = Carbon::now()->subYears($data['max_age']);
            $students->where('birthday', '>=', $max);
        }

        if (!empty($data['phones'])) {
            $students->where(function ($query) use ($data) {
                foreach ($data['phones'] as $key => $phone) {
                    $query->orWhere('phone_number', 'regexp', $phone);
                }
            });
        }


        isset($data['min_mark']) ? $min = $data['min_mark'] : $min = '0';
        isset($data['max_mark']) ? $max = $data['max_mark'] : $max = '10';
        $students->whereHas('marks', function ($query) use ($data, $min, $max) {
            if (!empty($data['subject_id'])) {
                $query = $query->where('subject_id', $data['subject_id']);
            }

            $query->whereBetween('mark', [$min, $max]);
        });

        return $students->paginate(8);
    }
}

?>