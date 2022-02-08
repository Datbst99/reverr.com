<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('/uploads/files/icon_logo.png')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="{{mix('assets/admin/css/main.css')}}">
    <title> @yield('title') </title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="{{url('dashboard')}}">REVIEW ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('post.add')}}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{route('post.show')}}">Danh sách </a>
                        <a class="dropdown-item" href="{{route('product.add')}}">Thêm sản phẩm</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Thoát</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link">
                        <a href="{{url('dashboard')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-link active" >
                        <a href="?view=list-post">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('post.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('post.show')}}">Danh sách</a></li>
                            <li><a href="{{route('cate.add')}}">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="?view=list-product">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('product.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('product.show')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="?view=list-user">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{route('user.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('user.show')}}">Danh sách</a></li>
                        </ul>
                    </li>
            </div>
            <div id="wp-content">
                @yield('content')
            </div>
        </div>


    </div>

    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{mix('assets/admin/js/main.js')}}"></script>
    <script src="{{url('/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('/ckfinder/ckfinder.js')}}"></script>
    <script>
        CKEDITOR.replace('content-ck', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        })
    </script>
    <script>
        var button1 = document.getElementById('btn_file_add');
        button1.onclick = function() {
            selectFileWithCKFinder('file_name_add');
        };

        function selectFileWithCKFinder(elementId) {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var output = document.getElementById(elementId);
                        output.value = file.getUrl();
                    });

                    finder.on('file:choose:resizedImage', function(evt) {
                        var output = document.getElementById(elementId);
                        output.value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>