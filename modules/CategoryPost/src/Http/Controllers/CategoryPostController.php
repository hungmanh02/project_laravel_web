<?php
namespace Modules\CategoryPost\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;
use Modules\CategoryPost\src\Http\Requests\CategoryPostRequest;
use Modules\CategoryPost\src\Repositories\CategoryPostRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoryPostController extends Controller
{
    protected $categoryPostRepo;
    public function __construct(CategoryPostRepository $categoryPostRepo)
    {
        $this->categoryPostRepo=$categoryPostRepo;
    }
    public function index(){
        $pageTitle="Quản lý danh mục bài viết";
        return view('CategoryPost::list',compact('pageTitle'));
    }
    public function data(){
        $categories=$this->categoryPostRepo->getCategoryPosts();
        $categories = DataTables::of($categories)
        ->rawColumns(['edit', 'delete','link'])
        ->toArray();
        $categories['data'] = $this->getCategoriesTable($categories['data']);
        // dd($categories);
        return $categories;
    }
    public function getCategoriesTable($categories,$char='',&$result=[]){

        if(!empty($categories)){
            foreach($categories as $category){
                $row=$category;
                $row['name']=$char.$row['name'];
                $row['edit']='<a href="'.route('admin.category-posts.edit',$category['id']).'" class="btn btn-warning">Sửa</a>';
                $row['delete']='<a href="'.route('admin.category-posts.delete',$category['id']).'" class="btn btn-danger delete-action">Xóa</a>';
                $row['link']='<a href="" class="btn btn-primary">Xem</a>';
                $row['created_at']=Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');
                unset($row['sub_category_posts']);
                unset($row['updated_at']);
                $result[]=$row;
                if(!empty($category['sub_category_posts'])){
                    $this->getCategoriesTable($category['sub_category_posts'],$char.'- ',$result);
                }
            }
        }
        return $result;
    }
    public function create(){
        $pageTitle="Thêm danh mục bài viết";
        $categoryPosts=$this->categoryPostRepo->getAllCategoryPosts();
        return view('CategoryPost::add',compact('pageTitle','categoryPosts'));
    }
    public function store(CategoryPostRequest $request){
        $this->categoryPostRepo->createModule([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'parent_id'=>$request->parent_id,
        ]);
    //    dd($request->all());
        return redirect()->route('admin.category-posts.index')->with('msg',__('CategoryPost::messages.create.success'));
    }
    public function edit($categoryPost){
        $pageTitle="Cập nhật danh mục bài viết";
        $categoryPost=$this->categoryPostRepo->find($categoryPost);
        if(!$categoryPost){
            abort(404);
        }
        $categoryPosts=$this->categoryPostRepo->getAllCategoryPosts();
        return view('CategoryPost::edit',compact('categoryPost','pageTitle','categoryPosts'));
    }
    public function update(CategoryPostRequest $request,$categoryPost){
        $data=$request->except('_token'); // loại bỏ token
        $this->categoryPostRepo->update($categoryPost,$data);
        return back()->with('msg',__('CategoryPost::messages.update.success'));
    }
    public function delete($categoryPost){
        $this->categoryPostRepo->delete($categoryPost);
        return back()->with('msg',__('CategoryPost::messages.delete.success'));
    }
}
