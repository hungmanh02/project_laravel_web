<?php

namespace Modules\Post\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\CategoryPost\src\Models\CategoryPost;
use Modules\CategoryPost\src\Repositories\CategoryPostRepository;
use Modules\Post\src\Http\Requests\PostsRequest;
use Modules\Post\src\Repositories\PostRepository;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{

    protected $postRepo;
    protected $categoryPostRepo;

    public function __construct(PostRepository $postRepo,CategoryPostRepository $categoryPostRepo)
    {
        $this->postRepo=$postRepo;
        $this->categoryPostRepo=$categoryPostRepo;
    }

    public function index()
    {
        $pageTitle="Quản lý bài viết";

        return view('Post::list',compact('pageTitle'));
    }
    public function data(){
        $courses=$this->postRepo->getAllPosts();
        $courses= DataTables::of($courses)
        ->addColumn('edit',function($course) {
            return '<a href="'.route('admin.posts.edit',$course).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($course) {
            return '<a href="'.route('admin.posts.delete',$course).'" class="btn btn-danger delete-action">Xóa</a>';
        })
        ->editColumn('thumbnail', function($course) {
            return $course->thumbnail ? '<img src="'.$course->thumbnail.'" style="width:80px;"/>': '';
        })
        ->editColumn('created_at', function($course) {
            return Carbon::parse($course->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit', 'delete','thumbnail'])
        ->toJson();
        return $courses;

    }
    public function create()
    {
        $pageTitle="Thêm bài viết";
        $categoryPosts=$this->categoryPostRepo->getAllCategoryPosts();
        // dd($teachers);
        return view('Post::add',compact('pageTitle','categoryPosts'));
    }
    public function store(PostsRequest $request){
        $posts=$request->except(['_token']);

        $this->postRepo->createModule($posts);
        return redirect()->route('admin.posts.index')->with('msg',__('Post::messages.create.success'));
    }
    public function edit($post){
        $post=$this->postRepo->find($post);
        if(!$post){
            abort(404);
        }
        $categoryPosts=CategoryPost::all(['id','name']);
        $pageTitle="Sửa bài viết";
        return view('Post::edit',compact('post','pageTitle','categoryPosts'));
    }
    public function update(PostsRequest $request, $post){
        $posts=$request->except('_token'); // loại bỏ token

        $this->postRepo->update($post,$posts);
        return back()->with('msg',__('Post::messages.update.success'));
    }
    public function delete($post){
        $this->postRepo->delete($post);
        return back()->with('msg',__('Post::messages.delete.success'));
    }
    public function getCategoryPost($course)
    {
        $categories=[];
        foreach($course['category_posts'] as $category){
                $categories[$category]=[
                        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
                    ];
                }
        return $categories;
    }


}
