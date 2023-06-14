@extends('layouts.backend')
@section('title','Quản lý nhóm')
@section('content')
<p><a href="{{route('admin.groups.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Người tạo</th>
            <th>Thời gian</th>
            <th>Phân quyền</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tên</th>
            <th>Người tạo</th>
            <th>Thời gian</th>
            <th>Phân quyền</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </tfoot>
</table>
@include('parts.backend.delete')
@endsection
@section('scripts')
    <script>
            $(document).ready(function(){
                $("#datatable").DataTable(
                    {
                        processing: true,
                        serverSide: true,
                        ajax: "{{route('admin.groups.data')}}",
                        "columns": [
                            { "data": "name" },
                            { "data": "user_id" },
                            { "data": "created_at" },
                            { "data": "permissions" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
