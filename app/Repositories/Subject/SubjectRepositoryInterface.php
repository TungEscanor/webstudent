<?php
namespace App\Repositories\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Subject;
use App\Repositories\BaseRepositoryInterface;
interface SubjectRepositoryInterface extends BaseRepositoryInterface{
    public function showMark($id);
}
?>

