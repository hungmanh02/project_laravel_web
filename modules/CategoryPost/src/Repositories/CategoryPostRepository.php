<?php
namespace Modules\CategoryPost\src\Repositories;


use App\Repositories\BaseRepository;
use Modules\CategoryPost\src\Models\CategoryPost;
use Modules\CategoryPost\src\Repositories\CategoryPostRepositoryInterface;


class CategoryPostRepository extends BaseRepository implements CategoryPostRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {

        return CategoryPost::class;
    }
    public function getCategoryPosts()
    {
        return $this->model->with('subCategoryPosts')->whereParentId(0)->select(['id','name','slug','parent_id','created_at'])->latest();
    }
    //lấy dự sự dụng serve side
    public function getAllCategoryPosts(){
        return $this->getAll();
    }
}
