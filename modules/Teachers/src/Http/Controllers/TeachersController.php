<?php
namespace Modules\Teachers\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Modules\Teachers\src\Http\Requests\TeachersRequest;
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
        ->editColumn('image', function($teacher) {
            return $teacher->image ? '<img src="'.$teacher->image.'" style="width:80px;"/>': '';
        })
        ->editColumn('created_at', function($teacher) {
            return Carbon::parse($teacher->created_at)->format('d/m/Y H:i:s');
        })

        ->rawColumns(['edit', 'delete','image'])
        ->toJson();
        return $teachers;

    }
    public function create()
    {
        $pageTitle="Thêm giảng viên";
        // $teachers=$this->teachersRepo->getAllTeachers();
        return view('Teachers::add',compact('pageTitle',));
    }
    public function store(TeachersRequest $request){
        $teachers=$request->except(['_token']);
        $this->teachersRepo->createModule($teachers);
        return redirect()->route('admin.teachers.index')->with('msg',__('Teachers::messages.create.success'));
    }
    public function edit($teacher){
        $teacher=$this->teachersRepo->find($teacher);
        if(!$teacher){
            abort(404);
        }
        $pageTitle="Sửa khóa học";
        return view('Teachers::edit',compact('teacher','pageTitle',));
    }
    public function update(TeachersRequest $request, $id){
        $teacher=$request->except('_token','_method'); // loại bỏ token
        // dd($teacher);
        $this->teachersRepo->update($id,$teacher);
        return back()->with('msg',__('Teachers::messages.update.success'));
    }
    public function delete($id){
        $teacher=$this->teachersRepo->find($id);
        $status=$this->teachersRepo->delete($id);
        if($status){
            $image=$teacher->image;
            deleteFileStorage($image);
        }
        return back()->with('msg',__('Teachers::messages.delete.success'));
    }


}
