<?php
namespace App\Repositories\Mark;

use App\Mark;
use App\Subject;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
class MarkRepository extends BaseRepository implements MarkRepositoryInterface {
    public function __construct(Mark $mark){
        parent::__construct($mark);
    }
}
?>