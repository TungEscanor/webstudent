<?php
namespace App\Repositories\Mark;

use Illuminate\Database\Eloquent\Model;
use App\Mark;
use App\Repositories\Base\BaseRepositoryInterface;
interface MarkRepositoryInterface extends BaseRepositoryInterface{
    public function showStudentAndSubject();

    public function checkStudentAndSubject($request);

}
?>

