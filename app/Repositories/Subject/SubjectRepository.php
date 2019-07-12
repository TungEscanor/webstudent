<?php
namespace App\Repositories\Subject;

use App\Mark;
use App\Subject;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface {
    public function __construct(Subject $subject){
        parent::__construct($subject);
    }

    public function showMark($id){
        $marks = Mark::where('subject_id',$id)->paginate(8);
        return $marks;
    }
}
?>