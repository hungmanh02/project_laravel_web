<?php

namespace Modules\Group\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Group\src\Http\Requests\GroupsRequest;
use Modules\Group\src\Repositories\GroupRepository;
use Modules\User\src\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    protected $groupRepo;
    protected $userRepo;

    public function __construct(GroupRepository $groupRepo,UserRepository $userRepo)
    {
        $this->groupRepo=$groupRepo;
        $this->userRepo=$userRepo;
    }
    public function index(){
        $pageTitle="Quản lý nhóm";
        return view('Group::list',compact('pageTitle'));
    }
    public function data(){
        $groups=$this->groupRepo->getGroups();
        $groups= DataTables::of($groups)
        ->addColumn('permissions',function($group) {
            return '<a href="'.route('admin.groups.permissions',$group).'" class="btn btn-success">Phân quyền</a>';
        })
        ->addColumn('edit',function($group) {
            return '<a href="'.route('admin.groups.edit',$group).'" class="btn btn-warning">Sửa</a>';
        })

        ->addColumn('delete',function($group) {
            return '<a href="'.route('admin.groups.delete',$group).'" class="btn btn-danger  delete-action">Xóa</a>';
        })
        ->editColumn('created_at', function($group) {
            return Carbon::parse($group->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['permissions','edit', 'delete'])
        ->toJson();
        return $groups;

    }
    public function create()
    {
        $pageTitle="Thêm nhóm";
        return view('Group::add',compact('pageTitle'));
    }
    public function store(GroupsRequest $request){
        $this->groupRepo->createModule([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('admin.groups.index')->with('msg',__('Group::messages.create.success'));
    }
    public function edit($group){
        $group=$this->groupRepo->find($group);
        if(!$group){
            abort(404);
        }
        $pageTitle="Sửa nhóm";
        return view('Group::edit',compact('group','pageTitle'));
    }
    public function permissions($group){
        return "permissions";
    }
    public function postPermissions(Request $request,$group){
        return "permissions";
    }
    public function update(GroupsRequest $request, $group){
        $groups=$request->except('_token'); // loại bỏ token

        $this->groupRepo->update($group,$groups);
        return back()->with('msg',__('Group::messages.update.success'));
    }
    public function delete($group){
        $this->groupRepo->delete($group);
        return back()->with('msg',__('Group::messages.delete.success'));
    }

}
