<?php
namespace App\Repositories\Student;

use App\Http\Requests\StudentRequest;
use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Repositories\BaseRepositoryInterface;
interface StudentRepositoryInterface {
    public function showMark($id);
    public function store(StudentRequest $data);
    public function getAllList();
    public function getListById($id);
    public function update(StudentRequest $data,$id);
    public function destroy($id);
}
?>

