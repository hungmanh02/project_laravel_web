<?php
namespace Modules\Category\src\Repositories;


use App\Repositories\BaseRepository;
use Modules\Category\src\Models\Category;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {

        return Category::class;
    }
    public function getCategories()
    {
        return $this->model->select(['id','name','slug','parent_id','created_at'])->latest();
    }
    //lấy dự sự dụng serve side
    public function getAllCategories(){
        return $this->getCategories()->get();
    }
}
