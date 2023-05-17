@extends('layouts.backend')
@section('title','Sửa giảng viên')
@section('content')
@if (session('msg'))
<div class="alert alert-success">{{ session('msg')}}</div>
@endif
<form action="{{route('admin.teachers.update',$teacher->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name') ?? $teacher->name}}" class="form-control title @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Đường dẫn</label>
                <input type="text" name="slug" value="{{ old('slug')?? $teacher->slug}}" class="form-control slug @error('slug') is-invalid @enderror" id="" placeholder="Slug...">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Số năm kinh nghiệm</label>
                <input type="number" name="epx" value="{{ old('epx')?? $teacher->epx}}" class="form-control @error('epx') is-invalid @enderror" id="" placeholder="kinh nghiệm...">
                @error('epx')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="">Ảnh đại diện</label>
                        <input type="text" id="image"  readonly name="image" value="{{old('image') ?? $teacher->image}}" class="form-control @error('image') is-invalid @enderror" id=""
                        placeholder="Ảnh đại diện...">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button"  class="btn btn-primary" id="lfm" data-input="image"
                        data-preview="holder">
                            <i class="fa fa-save"></i> Chọn ảnh
                        </button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                            @if (old('image') || $teacher->image)
                            <img src="{{old('image')?? $teacher->image}}" alt=""/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Mô tả chi tiết bản thân</label>
                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror"
                 placeholder="Mô tả ...">
                 {{ old('description')?? $teacher->description}}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.teachers.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
@section('stylesheets')

    <style>
        img {
            max-width: 100%;
            height: auto !important;
        }
        #holder img{
            width: 100% !important;
        }
        .list-categories{
            max-height: 200px;
            overflow: auto;
        }
    </style>
@endsection
