@extends('layouts.backend')
@section('title','Thêm tùy chọn')
@section('content')
<form action="{{route('admin.options.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá trị</label>
                <input type="text" name="value" value="{{old('value')}}" class="form-control @error('value') is-invalid @enderror" id="" placeholder="Giá trị ...">
                @error('value')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.options.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
