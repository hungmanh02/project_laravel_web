<?php
namespace Modules\Teachers\src\Repositories;


use App\Repositories\BaseRepository;
use Modules\Teachers\src\Repositories\TeachersRepositoryInterface;
use Modules\Teachers\src\Models\Teacher;

class TeachersRepository extends BaseRepository implements TeachersRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {
        return Teacher::class;
    }
    public function getAllTeachers(){
        return $this->model->select(['id','name','slug','description','image','epx','created_at'])->latest();
    }
}
