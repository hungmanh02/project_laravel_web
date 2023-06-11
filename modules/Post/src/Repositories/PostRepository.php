<?php
namespace Modules\Post\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Post\src\Models\Post;
use Modules\Post\src\Repositories\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    //lay model tuong ung
    public function getModel()
    {
        return Post::class;
    }
    // public function getUsers($limit)
    // {
    //     return $this->model->paginate($limit);
    // }
    //lấy dự sự dụng serve side
    public function getAllPosts(){
        return $this->model->select(['thumbnail','id','title','slug','exceprt','created_at'])->latest();
    }
    public function createPostCategories($post,$data=[]){
        $post->categories()->attach($data);
        // dd($course);
    }
    public function updatePostCategories($course,$data=[]){
        $course->categories()->sync($data);
    }
    public function deletePostCategories($course){
        $course->categories()->detach();
    }

}
