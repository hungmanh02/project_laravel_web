@extends('layouts.backend')
@section('title','Quản lý người dùng')
@section('content')
<p><a href="{{route('admin.options.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Giá trị</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tên</th>
            <th>Giá trị</th>
            <th>Thời gian</th>
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
                        ajax: "{{route('admin.options.data')}}",
                        "columns": [
                            { "data": "name" },
                            { "data": "value" },
                            { "data": "created_at" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
