
@extends('layouts.client')

@section('title', 'Chi tiết')

@section('content')
<!-- =========End-header======== -->
<div id="content" class="container detail">
    <div class="post-left">
        <div class="post-detail">
            <div class="breadcrumb">
                <span class="current"><a href="/">Home</a></span> /
                <span class="current"><a href="{{url($post->slug)}}/{{$post->id}}">{{$post->name}}</a></span> /
                <span class="current current-page">{{$post->title}}</span>
            </div>
            <article class="post-pr">
                <h1 class="title-detail mb-4">{{$post->title}}</h1>
                <p class="desc-product">
                {{$post->desc_post}}
                </p>
                <div class="respon-table table-content">
                    <div class="title-content">Nội dung</div>
                    <div class="post-table">
                        {!! TableOfContents($post->content) !!}
                    </div>
                </div>
                <div id="post-content">
                 {!!makeContent($post->content)!!}
                </div>
            </article>
            <div class="selling">
                <span class="title-sel">
                    Top ưa chuộng
                </span>
                <div class="product-sel">
                    @foreach($products as $val)
                    <div class="item-selling">
                        <figure>
                            <a href="{{$val->link}}">
                                <img src="{{$val->img_pro}}" alt="{{$val->name}}">
                            </a>
                        </figure>
                        <div class="box-item-sel">
                            <div class="title-pro-sel">
                                <a href="{{$val->link}}" class="title-hot">{{$val->name}}</a>
                            </div>
                            <div class="price">
                                <span class="current-price">{!! formatMoney($val->current_price) !!}</span> <del class="prric">{!! formatMoney($val->old_price) !!}</del>
                            </div>
                            <div class="place-sel">
                                <a href="{{$val->link}}">Tới nơi bán</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <aside class="sidebar">
        <div class="latets-posts">
            <div class="title-table">Bài viết mới nhất</div>
            <div class="box-posts">
                @foreach($post_news as $val)
                <div class="item-latets-posts">
                    <figure class="thumb-post">
                        <a href="{{$val->postUrl()}}"><img src="{{$val->img_post}}" alt="{{$val->title}}" class="img-post-new"></a>
                    </figure>
                    <div class="post-new">
                        <h5>
                            <a href="{{$val->postUrl()}}">{{$val->title}}</a>
                        </h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="table-content mt-5">
            <div class="title-table">Mục lục</div>
            <div class="post-table">
            {!! TableOfContents($post->content) !!}
            </div>
        </div>
    </aside>
</div>
<!-- ============End-content======== -->



@endsection

@section('script_review')

@endsection