@extends('layouts.backend')
@section('title','Thêm nhóm')
@section('content')
<form action="{{route('admin.groups.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Tên...">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{--  <div class="col-6">
            <div class="mb-3">
                <label for="">Chọn </label>
                <select name="teacher_id" id="" class="form-select @error('teacher_id') is-invalid @enderror">
                    <option value="0">Chọn giảng viên</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}" {{ old('teacher_id')==$teacher->id ? 'selected':false;}}>{{$teacher->name}}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>  --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.groups.index')}}" class="btn btn-danger">Hủy</a>
        </div>

    </div>

</form>
@endsection
