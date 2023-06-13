@extends('layouts.backend')
@section('title','Sửa tùy chọn')
@section('content')
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<form action="{{route('admin.options.update',$option)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name') ?? $option->name}}" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá trị</label>
                <input type="text" name="value" value="{{old('value') ?? $option->value}}" class="form-control @error('value') is-invalid @enderror" id="" placeholder="Giá trị ...">
                @error('value')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{route('admin.options.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
