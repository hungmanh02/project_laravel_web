<?php
namespace Modules\Teachers\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Modules\Teachers\src\Repositories\TeachersRepository;
use Yajra\DataTables\Facades\DataTables;

class TeachersController extends Controller
{

    protected $teachersRepo;

    public function __construct(TeachersRepository $teachersRepo)
    {
        $this->teachersRepo=$teachersRepo;
    }

    public function index()
    {
        $pageTitle="Quản lý teachers";

        return view('Teachers::list',compact('pageTitle'));
    }
    public function data(){
        $teachers=$this->teachersRepo->getAllTeachers();
        $teachers= DataTables::of($teachers)
        ->addColumn('edit',function($teacher) {
            return '<a href="'.route('admin.teachers.edit',$teacher).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($teacher) {
            return '<a href="'.route('admin.teachers.delete',$teacher).'" class="btn btn-danger delete-action">Xóa</a>';
        })
        ->editColumn('created_at', function($teacher) {
            return Carbon::parse($teacher->created_at)->format('d/m/Y H:i:s');
        })
        ->editColumn('status', function($teacher) {
            return $teacher->status==1 ? '<button class="btn btn-success">Đã ra mắt</button>': '<button class="btn btn-warning">Chưa ra mắt</button>';
        })
        ->editColumn('price', function($teacher) {
            if($teacher->price){
                if($teacher->sale_price){
            $price= number_format($teacher->sale_price,0, '.',',').'đ';

                }else{

                    $price= number_format($teacher->price,0, '.',',').'đ';
                }
            }else{
                $price="Miễn phí";
            }

            return $price;
        })
        ->rawColumns(['edit', 'delete','status'])
        ->toJson();
        return $teachers;

    }
    public function create()
    {
        $pageTitle="Thêm teacher";
        // $categories=$this->categoryRepo->getAllCategories();
        // dd($categories);
        return view('Teachers::add',compact('pageTitle'));
    }
    public function store(CoursesRequest $request){
        // $courses=$request->except(['_token']);
        // if(!$courses['sale_price']){
        //     $courses['sale_price']=0;
        // }
        // if(!$courses['price']){
        //     $courses['price']=0;
        // }
        // $courses=$this->coursesRepo->createModule([
        //     'name'=>$request->name,
        //     'slug'=>$request->slug,
        //     'detail'=>$request->detail,
        //     'teacher_id' =>$request->teacher_id,
        //     'thumbnail' =>$request->thumbnail,
        //     'code' =>$request->code,
        //     'support'=>$request->supports,
        //     'price'=>$request->price?$request->price:0,
        //     'sale_price'=>$request->sale_price?$request->sale_price:0,

        // ]);
            //    $course=$this->coursesRepo->createModule($courses);
            //    print_r($course);
        // $courses=$request->all();
        // $categories=[];
        // foreach($courses['categories'] as $category){
        //         $categories[$category]=[
        //                 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        //                 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        //             ];
        //         }
        //         // dd($courses);
        //         return $course;
        // $this->coursesRepo->createCourseCategories($course,$categories);
        // return redirect()->route('admin.courses.index')->with('msg',__('Teachers::messages.create.success'));
    }
    public function edit($course){
        // $course=$this->coursesRepo->find($course);
        // if(!$course){
        //     abort(404);
        // }
        // $pageTitle="Sửa khóa học";
        // $categories=$this->categoryRepo->getAllCategories();
        // return view('Teachers::edit',compact('course','pageTitle','categories'));
    }
    public function update(CoursesRequest $request, $course){
        // $data=$request->except('_token'); // loại bỏ token
        // if(!$data['sale_price']){
        //     $data['sale_price']=0;
        // }
        // if(!$data['price']){
        //     $data['price']=0;
        // }
        // $this->coursesRepo->update($course,$data);
        // return back()->with('msg',__('Teachers::messages.update.success'));
    }
    public function delete($course){
        // $this->coursesRepo->delete($course);
        // return back()->with('msg',__('Teachers::messages.delete.success'));
    }


}