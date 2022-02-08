@extends('layouts.admin')


@section('title', 'Thêm Admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm admin
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên tài khoản</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="retype_pass">Nhập lại mật khẩu</label>
                    <input class="form-control" type="password" name="retype_pass" id="retype_pass">
                    @error('retype_pass')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <label for="">Chọn quyền</label>
                @foreach($roles as $role)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="role[]" class="form-check-input" value="{{$role->name}}">{{$role->name}}
                    </label>
                </div>
                @endforeach
                @error('role')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <button type="submit" class="btn btn-primary mt-4">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection