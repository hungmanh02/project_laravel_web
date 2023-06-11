@extends('layouts.backend')
@section('title','Quản lý khóa học')
@section('content')
<p><a href="{{route('admin.posts.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success text-center">{{ session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Đường link</th>
            <th>Đoạn trích</th>
            <th>Thời gian tạo</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Đường link</th>
            <th>Đoạn trích</th>
            <th>Thời gian tạo</th>
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
                        ajax: "{{route('admin.posts.data')}}",
                        "columns": [
                            { "data": "thumbnail" },
                            { "data": "title" },
                            { "data": "slug" },
                            { "data": "exceprt" },
                            { "data": "created_at" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
