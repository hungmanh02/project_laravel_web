<?php
namespace Modules\Courses\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Category\src\Repositories\CategoryRepository;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{

    protected $coursesRepo;
    protected $categoryRepo;

    public function __construct(CoursesRepository $coursesRepo,CategoryRepository $categoryRepo)
    {
        $this->coursesRepo=$coursesRepo;
        $this->categoryRepo=$categoryRepo;
    }

    public function index()
    {
        $pageTitle="Quản lý khóa học";

        return view('Courses::list',compact('pageTitle'));
    }
    public function data(){
        $courses=$this->coursesRepo->getAllCourses();
        $courses= DataTables::of($courses)
        ->addColumn('edit',function($course) {
            return '<a href="'.route('admin.courses.edit',$course).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($course) {
            return '<a href="'.route('admin.courses.delete',$course).'" class="btn btn-danger delete-action">Xóa</a>';
        })
        ->editColumn('created_at', function($course) {
            return Carbon::parse($course->created_at)->format('d/m/Y H:i:s');
        })
        ->editColumn('status', function($course) {
            return $course->status==1 ? '<button class="btn btn-success">Đã ra mắt</button>': '<button class="btn btn-warning">Chưa ra mắt</button>';
        })
        ->editColumn('price', function($course) {
            if($course->price){
                if($course->sale_price){
            $price= number_format($course->sale_price,0, '.',',').'đ';

                }else{

                    $price= number_format($course->price,0, '.',',').'đ';
                }
            }else{
                $price="Miễn phí";
            }

            return $price;
        })
        ->rawColumns(['edit', 'delete','status'])
        ->toJson();
        return $courses;

    }
    public function create()
    {
        $pageTitle="Thêm khóa học";
        $categories=$this->categoryRepo->getAllCategories();
        // dd($categories);
        return view('Courses::add',compact('pageTitle','categories'));
    }
    public function store(CoursesRequest $request){
        $courses=$request->except(['_token']);
        if(!$courses['sale_price']){
            $courses['sale_price']=0;
        }
        if(!$courses['price']){
            $courses['price']=0;
        }
        // dd($courses);
        $course  = $this->coursesRepo->create($courses);
        // dd($course);
        $categories=[];
        foreach($courses['categories'] as $category){
            $categories[$category]=['created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')];
        }
        $this->coursesRepo->createCourseCategories($course);
        return redirect()->route('admin.courses.index')->with('msg',__('Courses::messages.create.success'));
    }
    public function edit($course){
        $course=$this->coursesRepo->find($course);
        if(!$course){
            abort(404);
        }
        $pageTitle="Sửa khóa học";
        return view('Courses::edit',compact('course','pageTitle'));
    }
    public function update(CoursesRequest $request, $course){
        $data=$request->except('_token'); // loại bỏ token
        if(!$data['sale_price']){
            $data['sale_price']=0;
        }
        if(!$data['price']){
            $data['price']=0;
        }
        $this->coursesRepo->update($course,$data);
        return back()->with('msg',__('Courses::messages.update.success'));
    }
    public function delete($course){
        $this->coursesRepo->delete($course);
        return back()->with('msg',__('Courses::messages.delete.success'));
    }


}
