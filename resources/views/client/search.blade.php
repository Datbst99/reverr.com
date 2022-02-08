@extends('layouts.client')

@section('title', 'Tìm kiếm')

@section('content')


<!-- =========End-header======== -->
<div id="content" class="container category">
    <div class="slider">
        <div class="slider-left">
            <div class="item-slider">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top công nghệ mới nhất Top công nghệ mới nhất Top công nghệ mới nhất</a></h4>
            </div>
            <div class="item-slider">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top công nghệ mới nhất</a></h4>
            </div>
            <div class="item-slider">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top công nghệ mới nhất</a></h4>
            </div>
            <div class="item-slider">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top công nghệ mới nhất</a></h4>
            </div>
            <div class="item-slider">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top công nghệ mới nhất</a></h4>
            </div>
        </div>
        <div class="slider-right">
            <div class="pro-hot">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top sản phẩm hot</a></h4>
            </div>
            <div class="pro-hot">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top sản phẩm hot</a></h4>
            </div>
            <div class="pro-hot">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top sản phẩm hot</a></h4>
            </div>
            <div class="pro-hot">
                <a href=""><img src="https://tackexinh.com/wp-content/uploads/2021/01/hinh-anh-dep-chat-luong-001.jpg" alt=""></a>
                <h4 class=title-hot><a href="">Top sản phẩm hot</a></h4>
            </div>
        </div>
    </div>
    <div class="wp-cate">
        <div class="item-cate">
            <h3 class="title-cate">Kết quả tìm kiếm</h3>
            <div class="wp-box">
                @if($posts[0] != "")
                @foreach($posts as $post)
                <article class="sub-cate">
                    <a href="{{$post->postUrl()}}"><img src="{{$post->img_post}}" alt="{{$post->title}}"></a>
                    <div class="text-title">
                        <h4 class="title-post"><a href="{{$post->postUrl()}}">{{$post->title}}</a></h4>
                        <p class="desc-post">{{$post->desc_post}}</p>
                        <a href="{{$post->postUrl()}}" class="text-detail">Chi tiết >></a>
                    </div>
                </article>
                @endforeach
                @else
                <p>Không tìm thấy kết quả tìm kiếm</p>
                @endif
            </div>
        </div>
        <div class="pagging" style="justify-content:flex-end;">
            {{$posts->links()}}
        </div>
        <div class="item-cate">
            <h3 class="title-cate">Mã giảm giá</h3>
            <div class="wp-box">
                <div class="coupon">
                    <a href="">
                        <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg" alt="">
                    </a>
                </div>
                <div class="coupon">
                    <a href="">
                        <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg" alt="">
                    </a>
                </div>
                <div class="coupon">
                    <a href="">
                        <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============End-content======== -->


@endsection