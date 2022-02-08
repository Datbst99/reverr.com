@extends('layouts.client')

@section('title', 'Trang chủ')

@section('content')

<!-- =========End-header======== -->
<div id="content" class="container">
    <div class="slider">
        <div class="slider-left">
            @foreach($hot_posts as $val)
            <div class="item-slider" >
                <a href="{{$val->postUrl()}}"><img src="{{$val->img_post}}" alt="{{$val->title}}"></a>
                <h4 class=title-hot>
                    <a href="{{$val->postUrl()}}"> {{$val->title}} </a>
                </h4>
            </div>
            @endforeach
        </div>
        <div class="slider-right">

            @foreach($view_posts as $val)
            <div class="pro-hot">
                <a href="{{$val->postUrl()}}"><img src="{{$val->img_post}}" alt="{{$val->title}}"></a>
                <h4 class=title-hot><a href="{{$val->postUrl()}}">{{$val->title}}</a></h4>
            </div>
            @endforeach

        </div>
    </div>
    <div class="wp-cate">
        @foreach($categories as $category)
        <div class="item-cate">
            <h3><a href="{{$category->urlCate()}}">{{$category->name}}</a></h3>
            <div class="wp-box">
                @foreach($posts[$category->id] as $post)
                @if($category->id == $post->cate_id)
                <article class="sub-cate">
                    <a href="{{$post->postUrl()}}"><img src="{{$post->img_post}}" alt="{{$post->title}}"></a>
                    <div class="text-title">
                        <h4 class="title-post"><a href="{{$post->postUrl()}}">{{$post->title}}</a></h4>
                        <p class="desc-post">{{$post->desc_post}}</p>
                        <a href="{{$post->postUrl()}}" class="text-detail">Chi tiết >></a>
                    </div>
                </article>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="item-cate">
            <h3><a href="">Mã giảm giá</a></h3>
            <div class="wp-box">
                <div class="coupon">
                    <a href="{{url('/update/ma-giam-gia/shoppe')}}">
                        <img src="/uploads/files/coupon-shopee.jpg" alt="">
                    </a>
                </div>
                <div class="coupon">
                    <a href="{{url('/update/ma-giam-gia/lazada')}}">
                        <img src="/uploads/files/coupon-lazada.png" alt="">
                    </a>
                </div>
                <div class="coupon">
                    <a href="{{url('/update/ma-giam-gia/tiki')}}">
                        <img src="/uploads/files/coupon-tiki.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============End-content======== -->


@endsection