<?php
namespace Modules\Courses\src\Repositories;


use App\Repositories\BaseRepository;
use Modules\Courses\src\Models\Course;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;

class CoursesRepository extends BaseRepository implements CoursesRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {

        return Course::class;
    }
    // public function getUsers($limit)
    // {
    //     return $this->model->paginate($limit);
    // }
    //lấy dự sự dụng serve side
    public function getAllCourses(){
        return $this->model->select(['id','name','price','sale_price','status','created_at'])->latest();
    }
}
