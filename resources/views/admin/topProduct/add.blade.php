@extends('layouts.admin')

@section('title', 'Thêm sản phẩm hot')

@section('content')

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        @if(session('product'))
        <div class="alert alert-success">
            <strong>Success!</strong>{{session('product')}}
        </div>
        @endif
        <div class="card-body">
            <form action="{{route('product.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="current-price">Giá mới</label>
                    <input class="form-control" type="text" name="current_price" id="current-price" value="{{old('current_price')}}">
                    @error('current_price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="old-price">Giá cũ</label>
                    <input class="form-control" type="text" name="old_price" id="old-price" value="{{old('olf_price')}}">
                    @error('old_price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link-product">Link sản phẩm</label>
                    <input class="form-control" type="text" name="link_product" id="link-product" value="{{old('link_product')}}">
                    @error('link_product')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <label for="">Thêm ảnh bìa</label> <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" id="btn_file_add" type="button">Chọn file</button>
                    </div>
                    <input type="text" class="form-control" id="file_name_add" name="img_product" placeholder="Tên file" value="{{old('img_product')}}">
                </div>
                @error('img_product')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror<br>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" id="" name="cate">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                    @error('cate')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="private">
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="public" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            Công khai
                        </label>
                    </div>
                </div>
                @error('status')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>


@endsection