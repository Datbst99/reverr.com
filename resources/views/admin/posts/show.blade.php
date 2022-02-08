<?php $i = 1; ?>
@extends('layouts.admin')

@section('title', 'Danh sách bài viết')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        @if(session('delete'))
        <div class="alert alert-success">
            {{session('delete')}}
        </div>
        @endif
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width:10%">Ảnh</th>
                        <th scope="col" style="width:30%">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td><img src="{{$post->urlImg()}}" alt="" style="width: 100%;"></td>
                        <td><a href="">{{$post->title}}</a></td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->username}}</td>
                        <td>{{date('d/m/Y h:i', $post->publish_at)}}</td>
                        <td>{{$post->status}}</td>
                        <td>
                            <a href="{{url('/edit-post')}}/{{$post->id}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{url('/delete-post')}}/{{$post->id}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                {{$posts->links()}}
            </nav>
        </div>
    </div>
</div>
@endsection