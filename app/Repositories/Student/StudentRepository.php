<?php

namespace App\Repositories\Student;

use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
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
        if (isset($data['min_age']) && isset($data['max_age'])) {
            $min = Carbon::now()->subYears($data['min_age']);
            $max = Carbon::now()->subYears($data['max_age']);
            $students = $this->model->whereBetween('birthday', [$max, $min]);
            if (!empty($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        } else {
            $students = $this->model->query();
            if (!empty($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        }

        if (isset($data['min_mark']) && isset($data['max_mark']) && isset($data['subject_id'])) {
            $students->whereHas('mark', function ($query) use ($data) {
                $query->where('subject_id', $data['subject_id'])
                    ->whereBetween('mark', [$data['min_mark'], $data['max_mark']]);
            });
        }
        return $students->paginate(8);
    }


}

?>