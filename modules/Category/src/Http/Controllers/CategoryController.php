<?php
namespace Modules\Category\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;
use Modules\Category\src\Http\Requests\CategoryRequest;
use Modules\Category\src\Repositories\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo=$categoryRepo;
    }
    public function index(){
        $pageTitle="Quản lý categories";
        return view('Category::list',compact('pageTitle'));
    }
    public function data(){
        $categories=$this->categoryRepo->getCategories();
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
                $row['edit']='<a href="'.route('admin.categories.edit',$category['id']).'" class="btn btn-warning">Sửa</a>';
                $row['delete']='<a href="'.route('admin.categories.delete',$category['id']).'" class="btn btn-danger delete-action">Xóa</a>';
                $row['link']='<a href="" class="btn btn-primary">Xem</a>';
                $row['created_at']=Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');
                unset($row['sub_categories']);
                unset($row['updated_at']);
                $result[]=$row;
                if(!empty($category['sub_categories'])){
                    $this->getCategoriesTable($category['sub_categories'],$char.'- ',$result);
                }
            }
        }
        return $result;
    }
    public function create(){
        $pageTitle="Add categories";
        $categories=$this->categoryRepo->getAllCategories();
        return view('Category::add',compact('pageTitle','categories'));
    }
    public function store(CategoryRequest $request){
        $this->categoryRepo->create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'parent_id'=>$request->parent_id,
        ]);
    //    dd($request->all());
        return redirect()->route('admin.categories.index')->with('msg',__('Category::messages.create.success'));
    }
    public function edit($category){
        $pageTitle="Cập nhật danh mục";
        $category=$this->categoryRepo->find($category);
        if(!$category){
            abort(404);
        }
        $categories=$this->categoryRepo->getAllCategories();
        return view('Category::edit',compact('category','pageTitle','categories'));
    }
    public function update(CategoryRequest $request,$category){
        $data=$request->except('_token'); // loại bỏ token
        $this->categoryRepo->update($category,$data);
        return back()->with('msg',__('Category::messages.update.success'));
    }
    public function delete($category){
        $this->categoryRepo->delete($category);
        return back()->with('msg',__('Category::messages.delete.success'));
    }
}
