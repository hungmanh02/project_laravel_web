@extends('layouts.backend')
@section('title','Thêm khóa học')
@section('content')
<form action="{{route('admin.courses.store')}}" method="POST">
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
                <label for="">Tên</label>
                <input type="text" name="slug" value="{{ old('slug')}}" class="form-control slug @error('slug') is-invalid @enderror" id="" placeholder="Slug...">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Chọn giảng viên</label>
                <select name="teacher_id" id="" class="form-select @error('teacher_id') is-invalid @enderror">
                    <option value="0">Chọn nhóm</option>
                    <option value="1">Hoàng An</option>
                    <option value="2">Hoàng Tâm</option>
                </select>
                @error('teacher_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Mã khóa học</label>
                <input type="text" name="code" value="{{old('code')}}" class="form-control @error('code') is-invalid @enderror" id="" placeholder="Mã khóa học...">
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá khóa học</label>
                <input type="number" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" id="" placeholder="Giá khóa học...">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá khuyến mãi</label>
                <input type="number" name="sale_price" value="{{old('sale_price')}}" class="form-control @error('sale_price') is-invalid @enderror" id="" placeholder="Giá khuyến mãi...">
                @error('sale_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tài liệu đính kèm</label>
                <select name="is_document" id="" class="form-select @error('is_document') is-invalid @enderror">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
                @error('is_document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-select @error('status') is-invalid @enderror">
                    <option value="0">Chưa ra mắt</option>
                    <option value="1">Đã ra mắt</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="">Ảnh đại diện</label>
                        <input type="text" id="thumbnail"  readonly name="thumbnail" value="{{old('thumbnail')}}" class="form-control @error('thumbnail') is-invalid @enderror" id=""
                        placeholder="Ảnh đại diện...">
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button"  class="btn btn-primary" id="lfm" data-input="thumbnail"
                        data-preview="holder">
                            <i class="fa fa-save"></i> Chọn ảnh
                        </button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Nội dung</label>
                <textarea name="detail" class="form-control ckeditor @error('detail') is-invalid @enderror"
                 placeholder="Nội dung ..."></textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Hỗ trợ</label>
                <textarea name="supports" class="form-control  ckeditor @error('supports') is-invalid @enderror"
                 placeholder="Hỗ trợ ..."></textarea>
                @error('supports')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.courses.index')}}" class="btn btn-danger">Hủy</a>
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
    </style>
@endsection
