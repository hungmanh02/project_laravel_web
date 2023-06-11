@extends('layouts.backend')
@section('title','Thêm bài viết')
@section('content')
@if (session('msg'))
<div class="alert alert-success text-center">{{ session('msg')}}</div>
@endif
<form action="{{route('admin.posts.update',$post)}}" method="POST">
    @csrf
@method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tiêu đề bài viết</label>
                <input type="text" name="title" value="{{ old('title') ?? $post->title}}" class="form-control title @error('title') is-invalid @enderror" id="" placeholder="Tiêu đề...">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Đường link</label>
                <input type="text" name="slug" value="{{ old('slug') ?? $post->slug}}" class="form-control slug @error('slug') is-invalid @enderror" id="" placeholder="Đường link...">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Chọn danh mục bài viết</label>
                <select name="post_id" id="" class="form-select @error('post_id') is-invalid @enderror">
                    <option value="0">Chọn danh mục bài viết</option>
                    @foreach ($categoryPosts as $categoryPost)
                    <option value="{{$categoryPost->id}}" {{ old('post_id')==$categoryPost->id || $post->post_id ==$categoryPost->id? 'selected':false;}}>{{$categoryPost->name}}</option>
                    @endforeach
                </select>
                @error('post_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="row  {{$errors->has('thumbnail')? 'align-items-center':'align-items-end'}}">
                    <div class="col-7">
                        <label for="">Ảnh bài viết</label>
                        <input type="text" id="thumbnail"  readonly name="thumbnail" value="{{old('thumbnail') ?? $post->thumbnail}}" class="form-control {{$errors->has('thumbnail')? 'is-invalid':''}}" id=""
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
                            @if (old('thumbnail') || $post->thumbnail)
                            <img src="{{old('thumbnail') ?? $post->thumbnail}}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Đoạn trích</label>
                <textarea name="exceprt" class="form-control ckeditor @error('exceprt') is-invalid @enderror"
                 placeholder="Đoạn trích ...">
                 {{ old('exceprt') ?? $post->exceprt}}
                </textarea>
                @error('exceprt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="">Nội dung</label>
                <textarea name="content" class="form-control  ckeditor @error('content') is-invalid @enderror"
                 placeholder="Nội dung bài viết ...">
                 {{ old('content') ?? $post->content}}
                </textarea>
                @error('content')
                 <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Hủy</a>
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
