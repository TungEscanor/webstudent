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
        if (isset($data['min_age']) || isset($data['max_age'])) {
          isset($data['min_age']) ?  $min = Carbon::now()->subYears($data['min_age']) : $min = Carbon::now();
          isset($data['max_age']) ?  $max = Carbon::now()->subYears($data['max_age']) : $max = Carbon::now()->subYears('100');dd($max);
            $students = $this->model->whereBetween('birthday', [$max, $min]);
            if (isset($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        } else {
            $students = $this->model->query();
            if (isset($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        }

        if (isset($data['min_mark']) || isset($data['max_mark']) && isset($data['subject_id'])) {
            isset($data['min_mark']) ? $min = $data['min_mark'] : $min = '0';
            isset($data['max_mark']) ? $max = $data['max_mark'] : $max = '10';
            $students->whereHas('marks', function ($query) use ($data,$min,$max) {
                $query->where('subject_id', $data['subject_id'])
                    ->whereBetween('mark', [$min, $max]);
            });
        }

        if (isset($data['min_mark']) || isset($data['max_mark'])) {
            isset($data['min_mark']) ? $min = $data['min_mark'] : $min = '0';
            isset($data['max_mark']) ? $max = $data['max_mark'] : $max = '10';
            $students->whereHas('marks', function ($query) use ($data,$min,$max) {
                $query->whereBetween('mark',[$min, $max]);
            });
        }
        return $students->paginate(8);
    }
}

?>