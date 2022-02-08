{{--@extends('layouts.admin')--}}

{{--@section('title', 'Chỉnh sửa bài viết')--}}

{{--@section('content')--}}
{{--    <div id="content" class="container-fluid">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header font-weight-bold">--}}
{{--                Thêm bài viết--}}
{{--            </div>--}}
{{--            @if(session('alert'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    <strong>Success!</strong>Chỉnh sửa bài viết {{session('alert')}} thành công--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="card-body">--}}
{{--                <form action="{{route('post.store')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="title">Tiêu đề bài viết</label>--}}
{{--                        <input class="form-control" type="text" name="title" id="title" value="{{ !empty(Request::get('title')) ? old('title') : $post->title }}">--}}
{{--                        @error('title')--}}
{{--                        <small class="form-text text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="slug">Slug</label>--}}
{{--                        <input class="form-control" type="text" name="slug" id="slug" value="{{old('slug')}}">--}}
{{--                        @error('slug')--}}
{{--                        <small class="form-text text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="desc-post">Mô tả bài viết</label>--}}
{{--                        <textarea name="desc" id="desc-post" class="desc-post form-control">{{old('desc')}}</textarea>--}}
{{--                        @error('desc')--}}
{{--                        <small class="form-text text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <label for="">Thêm ảnh bìa</label> <br>--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <button class="btn btn-outline-secondary" id="btn_file_add" type="button">Chọn file</button>--}}
{{--                        </div>--}}
{{--                        <input type="text" class="form-control" id="file_name_add" name="img_post" placeholder="Tên file" value="{{old('img_post')}}">--}}
{{--                    </div>--}}
{{--                    @error('img_post')--}}
{{--                    <small class="form-text text-danger">{{$message}}</small>--}}
{{--                    @enderror<br>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="content">Nội dung bài viết</label>--}}
{{--                        <textarea name="content" id="content-ck" class="content-ck">{{old('content')}}</textarea>--}}
{{--                        @error('content')--}}
{{--                        <small class="form-text text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="date">Ngày đăng</label>--}}
{{--                        <input class="form-control" type="date" name="date" id="date">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="time">Giờ đăng</label>--}}
{{--                        <input class="form-control" type="time" name="time" id="time">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Danh mục</label>--}}
{{--                        <select class="form-control" id="" name="cate">--}}
{{--                            <option value="">Chọn danh mục</option>--}}
{{--                            @foreach($categories as $val)--}}
{{--                                <option value="{{$val->id}}">{{$val->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @error('cate')--}}
{{--                        <small class="form-text text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Trạng thái</label>--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="private">--}}
{{--                            <label class="form-check-label" for="exampleRadios1">--}}
{{--                                Chờ duyệt--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="public" checked>--}}
{{--                            <label class="form-check-label" for="exampleRadios2">--}}
{{--                                Công khai--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @error('status')--}}
{{--                    <small class="form-text text-danger">{{$message}}</small>--}}
{{--                    @enderror--}}
{{--                    <button type="submit" class="btn btn-primary">Thêm mới</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
