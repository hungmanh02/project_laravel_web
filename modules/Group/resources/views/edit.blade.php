@extends('layouts.backend')
@section('title','Sửa tùy chọn')
@section('content')
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<form action="{{route('admin.groups.update',$group)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name') ?? $group->name}}" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá trị</label>
                <input type="text" name="user_id" value="{{old('user_id') ?? $group->user_id}}" class="form-control @error('user_id') is-invalid @enderror" id="" placeholder="Giá trị ...">
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{route('admin.groups.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
