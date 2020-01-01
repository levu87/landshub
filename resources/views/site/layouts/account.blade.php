<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>LandsHub - @yield('title')</title>
    <meta content="Landshub" name="description" />
    <meta content="Quocsuu" name="author" />
    @include('site.layouts.head')
    <link rel="shortcut icon" type="image/png"  href="{{ URL::asset('assets/client/img/favicon.png') }}">

</head>
<body>
    @if (Route::getCurrentRoute()->uri() != '/')
    <div class="page sub-page ">
        @else
        <div class="page ">
            @endif
            <header class="hero @yield('header-css')">
                <div class="hero-wrapper">
                    @include('site.layouts.tophead')
                    @include('site.layouts.header')
                    @include('site.layouts.settings')
                </div>
            </header>
            <section class="content">
                <section class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <nav class="nav flex-column side-nav">
                                    <a class="nav-link {{Route::getCurrentRoute()->uri() == "tai-khoan" ? "active":''}} icon"
                                        href="{{ url('/tai-khoan') }}">
                                        <i class="fa fa-user"></i>Thông tin cá nhân
                                    </a>
                                    <a class="nav-link icon {{Route::getCurrentRoute()->uri() == "quan-ly-tin" ? "active":''}}"
                                        href="{{ url('/quan-ly-tin') }}">
                                        <i class="fa fa-list"></i>Quản lý tin
                                    </a>
                                    <a class="nav-link icon {{Route::getCurrentRoute()->uri() == "doi-mat-khau" ? "active":''}}"
                                        href="{{ url('/doi-mat-khau') }}">
                                        <i class="fa fa-recycle"></i>Đổi mật khẩu
                                    </a>
                                </nav>
                            </div>
                            <div class="col-md-9">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <footer class="footer">
                @include('site.layouts.footer')
            </footer>
        </div>
        @include('site.layouts.footer-script')
        <a href="#" class="back-to-top rounded text-center" id="back-to-top">
            <i class="fa fa-chevron-up"> </i>
        </a>
        @yield('modal')
</body>
</html>