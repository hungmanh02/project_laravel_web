<?php
namespace Modules\Courses\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Category\src\Repositories\CategoryRepository;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Modules\Teachers\src\Repositories\TeachersRepository;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{

    protected $coursesRepo;
    protected $categoryRepo;
    protected $teacherRepo;

    public function __construct(CoursesRepository $coursesRepo,CategoryRepository $categoryRepo, TeachersRepository $teacherRepo)
    {
        $this->coursesRepo=$coursesRepo;
        $this->categoryRepo=$categoryRepo;
        $this->teacherRepo=$teacherRepo;
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
        $teachers=$this->teacherRepo->getAllTeachers()->get();
        // dd($teachers);
        return view('Courses::add',compact('pageTitle','categories','teachers'));
    }
    public function store(CoursesRequest $request){
        $courses=$request->except(['_token']);
        if(!$courses['sale_price']){
            $courses['sale_price']=0;
        }
        if(!$courses['price']){
            $courses['price']=0;
        }

         $course=$this->coursesRepo->createModule($courses);

        $categories= $this->getCategories($courses);

        $this->coursesRepo->createCourseCategories($course,$categories);
        return redirect()->route('admin.courses.index')->with('msg',__('Courses::messages.create.success'));
    }
    public function edit($course){
        $course=$this->coursesRepo->find($course);
        $categoryIds=$this->coursesRepo->getRelatedCategories($course);
        $teachers=$this->teacherRepo->getAllTeachers()->get();
        if(!$course){
            abort(404);
        }
        $pageTitle="Sửa khóa học";
        $categories=$this->categoryRepo->getAllCategories();
        return view('Courses::edit',compact('course','pageTitle','categories','categoryIds','teachers'));
    }
    public function update(CoursesRequest $request, $id){
        $course=$request->except('_token'); // loại bỏ token
        if(!$course['sale_price']){
            $course['sale_price']=0;
        }
        if(!$course['price']){
            $course['price']=0;
        }
        $this->coursesRepo->update($id,$course);
        $categories= $this->getCategories($course);
        $courses=$this->coursesRepo->find($id);
        $this->coursesRepo->updateCourseCategories($courses,$categories);
        return back()->with('msg',__('Courses::messages.update.success'));
    }
    public function delete($id){
        $course=$this->coursesRepo->find($id);
        $this->coursesRepo->deleteCourseCategories($course);
        $this->coursesRepo->delete($id);
        return back()->with('msg',__('Courses::messages.delete.success'));
    }
    public function getCategories($course)
    {
        $categories=[];
        foreach($course['categories'] as $category){
                $categories[$category]=[
                        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
                    ];
                }
        return $categories;
    }


}
