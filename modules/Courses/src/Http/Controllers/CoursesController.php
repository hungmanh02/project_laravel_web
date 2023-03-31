<?php
namespace Modules\Courses\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{

    protected $coursesRepo;

    public function __construct(CoursesRepository $coursesRepo)
    {
        $this->coursesRepo=$coursesRepo;
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
        ->rawColumns(['edit', 'delete'])
        ->toJson();
        return $courses;

    }
    public function create()
    {
        $pageTitle="Thêm khóa học";
        return view('Courses::add',compact('pageTitle'));
    }
    public function store(CoursesRequest $request){
        // $this->coursesRepo->create([
        //     'name'=>$request->name,
        //     // 'email'=>$request->email,
        //     // 'group_id'=>$request->group_id,
        //     // 'password'=>Hash::make($request->password),
        // ]);
        return redirect()->route('admin.courses.index')->with('msg',__('Courses::messages.create.success'));
    }
    public function edit($course){
        // $course=$this->coursesRepo->find($course);
        // if(!$course){
        //     abort(404);
        // }
        // $pageTitle="Sửa khóa học";
        return view('Courses::edit',compact('course','pageTitle'));
    }
    public function update(CoursesRequest $request, $course){
        $data=$request->except('_token'); // loại bỏ token và password
        // if($request->password){
        //     $data['password']=Hash::make($request->password);
        // }
        $this->coursesRepo->update($course,$data);
        return back()->with('msg',__('Courses::messages.update.success'));
    }
    public function delete($course){
        $this->coursesRepo->delete($course);
        return back()->with('msg',__('Courses::messages.delete.success'));
    }


}
