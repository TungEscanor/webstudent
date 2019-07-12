<?php
namespace App\Repositories\Specialty;

use App\Specialty;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
class SpecialtyRepository extends BaseRepository implements SpecialtyRepositoryInterface {
    public function __construct(Specialty $specialty){
        parent::__construct($specialty);
    }
}
?>