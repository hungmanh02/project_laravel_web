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
        return $this->model->select(['id','name','thumbnail','price','sale_price','status','created_at'])->latest();
    }
    public function createCourseCategories($course,$data=[]){
        $course->categories()->attach($data);
        // dd($course);
    }
    public function updateCourseCategories($course,$data=[]){
        $course->categories()->sync($data);
    }
    public function deleteCourseCategories($course){
        $course->categories()->detach();
    }
    public function getRelatedCategories($course){
        $categoryIds=$course->categories()->allRelatedIds()->toArray();
        // dd($categoryIds); chuyển thành 1 array
        return $categoryIds;
    }
}
