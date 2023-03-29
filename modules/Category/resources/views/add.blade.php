@extends('layouts.backend')
@section('title','Thêm người dùng')
@section('content')
<form action="{{route('admin.categories.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name')}}" class="form-control title @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control slug @error('slug') is-invalid @enderror" id="" placeholder="Slug...">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Cha</label>
                <select name="parent_id" id="" class="form-select @error('parent_id') is-invalid @enderror">
                    <option value="0">Không</option>
                    {{getCategories($categories, old('parent_id'))}}
                </select>
                @error('parent_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.categories.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
