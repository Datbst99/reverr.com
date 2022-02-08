<?php $i = 1; ?>
@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <br>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>

                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá mới</th>
                        <th scope="col">Giá cũ</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td style="width:10%"><img src="{{$product->img_pro}}" alt="" style="width:100%"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->current_price}}</td>
                        <td>{{$product->old_price}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            @if($product->status == 'public')
                            <span class="badge badge-success">{{$product->status}}</span>
                            @else
                            <span class="badge badge-dark">{{$product->status}}</span>
                        </td>
                        @endif
                        <td>
                            <a href="{{$product->urlEdit()}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{$product->urlDelete()}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                {{$products->links()}}
            </nav>
        </div>
    </div>
</div>
@endsection