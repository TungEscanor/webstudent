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
        $students = $this->model->query();
        if ((isset($data['min_age']) && isset($data['max_age'])) || (isset($data['min_age']) && !isset($data['max_age'])) || (isset($data['max_age']) && !isset($data['min_age']))) {
            isset($data['min_age']) ? $min = Carbon::now()->subYears($data['min_age']) : $min = Carbon::now();
            if (isset($data['min_age']) && !isset($data['max_age'])) {
                $students->where('birthday', '<=', $min);
            } elseif (isset($data['max_age']) && !isset($data['min_age'])) {
                $max = Carbon::now()->subYears($data['max_age']);
                $students->where('birthday', '>=', $max);
            } elseif (isset($data['min_age']) && isset($data['max_age'])) {
                $min = Carbon::now()->subYears($data['min_age']);
                $max = Carbon::now()->subYears($data['max_age']);
                $students->where('birthday', '>=', $max)->where('birthday', '<=', $min);
            }
            if (isset($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        } else {
            if (isset($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        }

        if ((isset($data['min_mark']) || isset($data['max_mark'])) && $data['subject_id'] !== null) {
            isset($data['min_mark']) ? $min = $data['min_mark'] : $min = '0';
            isset($data['max_mark']) ? $max = $data['max_mark'] : $max = '10';
            $students->whereHas('marks', function ($query) use ($data, $min, $max) {
                $query->where('subject_id', $data['subject_id'])
                    ->whereBetween('mark', [$min, $max]);
            });
        } elseif ((isset($data['min_mark']) || isset($data['max_mark'])) && $data['subject_id'] === null) {
            isset($data['min_mark']) ? $min = $data['min_mark'] : $min = '0';
            isset($data['max_mark']) ? $max = $data['max_mark'] : $max = '10';
            $students->whereHas('marks', function ($query) use ($data, $min, $max) {
                $query->whereBetween('mark', [$min, $max]);
            });
        } elseif (isset($data['subject_id']) && !isset($data['min_mark']) && !isset($data['max_mark'])) {
            $students->whereHas('marks', function ($query) use ($data) {
                $query->where('subject_id', $data['subject_id']);
            });
        }
        return $students->paginate(8);
    }
}

?>