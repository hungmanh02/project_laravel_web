<?php

namespace Modules\Option\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Option\src\Http\Requests\OptionsRequest;
use Modules\Option\src\Repositories\OptionRepository;
use Yajra\DataTables\Facades\DataTables;

class OptionController extends Controller
{
    protected $optionRepo;

    public function __construct(OptionRepository $optionRepo)
    {
        $this->optionRepo=$optionRepo;
    }
    public function index(){
        $pageTitle="Quản lý tùy chọn";
        return view('Option::list',compact('pageTitle'));
    }
    public function data(){
        $options=$this->optionRepo->getOptions();
        $options= DataTables::of($options)
        ->addColumn('edit',function($option) {
            return '<a href="'.route('admin.options.edit',$option).'" class="btn btn-warning">Sửa</a>';
        })
        ->addColumn('delete',function($option) {
            return '<a href="'.route('admin.options.delete',$option).'" class="btn btn-danger  delete-action">Xóa</a>';
        })
        ->editColumn('created_at', function($option) {
            return Carbon::parse($option->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit', 'delete'])
        ->toJson();
        return $options;

    }
    public function create()
    {
        $pageTitle="Thêm tùy chọn";
        return view('Option::add',compact('pageTitle'));
    }
    public function store(OptionsRequest $request){
        $options=$request->except(['_token']);
        // dd($options);
        $this->optionRepo->createModule($options);
        return redirect()->route('admin.options.index')->with('msg',__('Option::messages.create.success'));
    }
    public function edit($option){
        $option=$this->optionRepo->find($option);
        if(!$option){
            abort(404);
        }
        $pageTitle="Sửa tùy chọn";
        return view('Option::edit',compact('option','pageTitle'));
    }
    public function update(OptionsRequest $request, $option){
        $options=$request->except('_token'); // loại bỏ token

        $this->optionRepo->update($option,$options);
        return back()->with('msg',__('Option::messages.update.success'));
    }
    public function delete($option){
        $this->optionRepo->delete($option);
        return back()->with('msg',__('Option::messages.delete.success'));
    }

}
