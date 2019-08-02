<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Models\Subject;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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

        if(!empty($data['min_mark'])) {
            $students->whereHas('marks', function ($query) use ($data) {
                if (!empty($data['subject_id'])) {
                    $query = $query->where('subject_id', $data['subject_id']);
                }

                $query->where('mark', '>=',$data['min_mark']);
            });
        }

        if(!empty($data['max_mark'])) {
            $students->whereHas('marks', function ($query) use ($data) {
                if (!empty($data['subject_id'])) {
                    $query = $query->where('subject_id', $data['subject_id']);
                }

                $query->where('mark', '<=',$data['max_mark']);
            });
        }

        $count_subjects = Subject::all()->count();

        if(!empty($data['done'])) {
            $students->has('subjects', '=', $count_subjects);
        }
        if(!empty($data['not_done'])) {
            $students->has('subjects','<>',$count_subjects);
        }

        return $students->paginate(5);
    }
}

?>