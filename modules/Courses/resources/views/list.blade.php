@extends('layouts.backend')
@section('title','Quản lý khóa học')
@section('content')
<p><a href="{{route('admin.courses.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Trạng thái</th>
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
                        ajax: "{{route('admin.courses.data')}}",
                        "columns": [
                            { "data": "thumbnail" },
                            { "data": "name" },
                            { "data": "price" },
                            { "data": "status" },
                            { "data": "created_at" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
