@extends('layouts.backend')
@section('title','Quản lý categories')
@section('content')
<p><a href="{{route('admin.categories.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<input type="hidden" name="" class="slug title">
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Slug</th>
            <th>Parent_id</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tên</th>
            <th>Slug</th>
            <th>Parent_id</th>
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
                        pageLength: 2,
                        ajax: "{{route('admin.categories.data')}}",
                        "columns": [
                            { "data": "name" },
                            { "data": "link" },
                            { "data": "parent_id" },
                            { "data": "created_at" },
                            { "data": "edit" },
                            { "data": "delete" },
                        ]
                    }
                );
            });
    </script>
@endsection
