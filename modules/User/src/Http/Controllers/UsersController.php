<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo=$userRepo;
    }

    public function index()
    {
        $pageTitle="Quản lý người dùng";

        return view('User::list',compact('pageTitle'));
    }
    public function data(){
        $users=$this->userRepo->getAllUsers();
        return DataTables::of($users)
        ->addColumn('edit',function($user) {
            return '<a href="'.route('admin.users.edit',$user).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($user) {
            return '<a href="'.route('admin.users.delete',$user).'" class="btn btn-danger delete-action">Xóa</a>';
        })
        ->editColumn('created_at', function($user) {
            return Carbon::parse($user->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit', 'delete'])
        ->toJson();

    }
    public function create()
    {
        $pageTitle="Thêm người dùng";
        return view('User::add',compact('pageTitle'));
    }
    public function store(UserRequest $request){
        $this->userRepo->createModule([
            'name'=>$request->name,
            'email'=>$request->email,
            'group_id'=>$request->group_id,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('admin.users.index')->with('msg',__('User::messages.create.success'));
    }
    public function edit($user){
        $user=$this->userRepo->find($user);
        if(!$user){
            abort(404);
        }
        $pageTitle="Sửa người dùng";
        return view('User::edit',compact('user','pageTitle'));
    }
    public function update(UserRequest $request, $user){
        $data=$request->except('_token','password'); // loại bỏ token và password
        if($request->password){
            $data['password']=Hash::make($request->password);
        }
        $this->userRepo->update($user,$data);
        return back()->with('msg',__('User::messages.update.success'));
    }
    public function delete($user){
        $this->userRepo->delete($user);
        return back()->with('msg',__('User::messages.delete.success'));
    }


}
