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
        $categories=$this->categoryRepo->getAllCategories();
        return DataTables::of($categories)
        ->addColumn('edit',function($category) {
            return '<a href="'.route('admin.categories.edit',$category).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($category) {
            return '<a href="'.route('admin.categories.delete',$category).'" class="btn btn-danger delete-action">Xóa</a>';
        })
        ->addColumn('link',function($category) {
            return '<a href="" class="btn btn-primary">Xem</a>';
        })
        ->editColumn('created_at', function($category) {
            return Carbon::parse($category->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit', 'delete','link'])
        ->toJson();
    }
    public function create(){
        $pageTitle="Add categories";
        return view('Category::add',compact('pageTitle'));
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
        return view('Category::edit',compact('category','pageTitle'));
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
