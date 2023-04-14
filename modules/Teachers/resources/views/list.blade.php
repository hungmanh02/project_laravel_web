@extends('layouts.backend')
@section('title',$pageTitle)
@section('content')
<p><a href="{{route('admin.courses.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Link</th>
            <th>Mô tả</th>
            <th>Kinh nghiệm</th>
            <th>hình ảnh</th>
            <th>thời gian</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tên</th>
            <th>Link</th>
            <th>Mô tả</th>
            <th>Kinh nghiệm</th>
            <th>hình ảnh</th>
            <th>thời gian</th>
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
                        ajax: "{{route('admin.teachers.data')}}",
                        "columns": [
                            { "data": "name" },
                            { "data": "slug" },
                            { "data": "description" },
                            { "data": "epx" },
                            { "data": "image" },
                            { "data": "created_at" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
