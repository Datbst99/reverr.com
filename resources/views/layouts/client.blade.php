<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots", content="noindex">
{!! seo_helper()->render() !!}
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{url('assets/css/slick.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
<link rel="stylesheet" href="{{mix('assets/css/client.css')}}">
<link rel="stylesheet" href="{{ url('assets/css/font-aw.css') }}">
<link rel="shortcut icon" href="{{url('/uploads/files/icon_logo.png')}}" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-205870692-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-205870692-1');
</script>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="header-top container">
                <div class="menu-respon">
                    <div class="icon-menu">
                        <div>
                            <button type="button" class="icon-respon menu-showJs">
                                <i class="fas fa-bars icon-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="/"> <img src="{{url('/uploads/files/logo-reverr-white.png')}}" alt="logo" class="img_logo"> </a>
                    <a href="/"> <img src="{{url('/uploads/files/logo-reverr.png')}}" alt="logo" class="img_respon_logo"></a>
                </div>
                <div class="menu-top">
                    <ul class="nav-menu">
                        <li class="item-menu"><a href="/">Trang chủ</a></li>
                        @foreach($categories as $category)
                        <li class="item-menu"><a href="{{$category->urlCate()}}">{{$category->name}}</a></li>
                        @endforeach
                        <li class="item-menu"><a href="">Giới thiệu</a></li>
                    </ul>
                </div>
                <div class="form-search">
                    <form action="{{route('client.search')}}" method="get">
                        <input type="text" name="search" class="search" placeholder="Bạn cần tìm gì?">
                        <input type="submit" value="search" class="searchJs" name="btn_search">
                        <i class="fas fa-search search-rela icon-searchJs"></i>
                    </form>
                </div>
                <div class="wp-r-search">
                    <form action="{{route('client.search')}}" method="get" class="search-respon">
                        <input type="text" name="search" class="inp-search-respon" placeholder="Bạn cần tìm gì?">
                        <input type="submit" value="search" class="search-responJs" name="btn_search">
                    </form>
                    <div class="add-s-J">
                        <i class="fas fa-search ic-responSJs"></i>
                    </div>
                </div>
            </div>
            <div class="menu-sub container">
                <ul class="nav-respon">
                    <li class="res-item-menu"><a href="">Trang chủ</a></li>
                    @foreach($categories as $category)
                    <li class="res-item-menu"><a href="{{$category->urlCate()}}">{{$category->name}}</a></li>
                    @endforeach
                    <li class="res-item-menu"><a href="">Giới thiệu</a></li>
                </ul>
            </div>
        </div>

        @yield('content')


        <div id="footer">
            <div class="footer-top">
                <div class="container footer-contact">
                    <div class="item-footer">
                        <h5 class="title-footer">
                            Reverr.com
                        </h5>
                        <p>
                            Reverr.com là Website #1 về đánh giá và xếp hạng sản phẩm đúng, chuẩn và tốt nhất. Reverr.com giúp bạn tìm được món đồ phù hợp, đảm bảo, giá cả phải chăng!
                        </p>
                    </div>

                    <div class="item-footer">
                        <h5 class="title-footer">
                            Kết nối chúng tôi
                        </h5>
                        <p></p>
                    </div>
                    <div class="item-footer">
                        <h5 class="title-footer">
                            Đăng ký nhận thông tin
                        </h5>
                        <div class="send-mail">
                            <form action="{{route('client.mail')}}" method="post">
                                @csrf
                                <input type="email" name="name_mail" placeholder="Email của bạn" class="inp-email">
                                <input type="submit" value="val_mail" name="btn_mail" class="val_mail mailJs">
                                <i class="fas fa-paper-plane icon-mail icon-mailJs"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footet-bottom">
                <div class="copy-right container">
                    <p class="text-copy">© 2021 Writing Designs, Reverr.com</p>
                </div>
            </div>
        </div>
        <!-- =============End-footer========== -->
        <div class="back-top"><i class="fas fa-angle-up icon-back"></i></div>
    </div>

    <script src="{{ url('assets/js/jquery.js') }}"></script>
    <script src="{{ url('assets/js/slick.js') }}"></script>
    <script src="{{mix('assets/js/client.js')}}"></script>
    @yield('script_review')
</body>

</html>
