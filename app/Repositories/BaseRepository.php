<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface{

    protected $model;
    public function __construct(Model $model){
        $this->model = $model;
    }
    public function getAllList(){
        return $this->model->paginate(8);
    }
    public function getListById($id){
        return $this->model->findOrFail($id);
    }

    public function store($data){
        return $this->model->create($data);
    }
    public function update($id,$data){
        $models = $this->getListById($id);
        return $models->update($data);
    }
    public function destroy($id){
        $models = $this->getListById($id);
        return $models->delete();
    }
}
?>