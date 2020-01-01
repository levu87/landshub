{{-- <div class="secondary-navigation">
    <div class="container">
        <ul class="left">
            <li>
                <span>
                    <i class="fa fa-phone"></i>093.771.8467
                </span>
            </li>
        </ul>
        <ul class="right">
            @if (Auth::check())
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-user-secret"></i>Admin
                </a>
            @endif
            </li>
            <li>
                <a href="{{ url('/tai-khoan') }}">
                    <i class="fa fa-user"></i>{{Auth::user()->name}}
                </a>
            </li>
            <li>
                <a href="{{ url('/dang-xuat') }}">
                    <i class="fa fa-arrow-right"></i>Đăng xuất
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('/dang-nhap') }}">
                    <i class="fa fa-sign-in"></i>Đăng nhập
                </a>
            </li>
            <li>
                <a href="{{ url('/dang-ky') }}">
                    <i class="fa fa-pencil-square-o"></i>Đăng ký
                </a>
            </li>
            @endif
        </ul>
    </div>
</div> --}}
<div class="main-navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between defaultscroll">
            <a class="navbar-brand" href="/">
                @if (Route::getCurrentRoute()->uri() != '/')
                <img src="{{ URL::asset('assets/client/img/logo1.png') }}" alt="">
                @else
                <img src="{{ URL::asset('assets/client/img/logo.png') }}" alt="">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                <li class="nav-item {{Route::getCurrentRoute()->uri() == '/' ?'active':''}}">
                        <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item {{Route::getCurrentRoute()->uri() == '/' ?'active':''}}">
                        <a class="nav-link" href="{{ url('/muc-du-an') }}">Dự án</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/thue') }}">Thuê</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/ban') }}">Bán</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tin-tuc') }}">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ky-goi') }}">Ký gởi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/lien-he') }}">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/tai-khoan') }}" class="btn btn-primary text-caps btn-rounded btn-framed">Đăng tin</a>
                    </li>
                </ul>
            </div>
            @if (Route::getCurrentRoute()->uri() != '/')
            <a href="#collapseMainSearchForm" class="main-search-form-toggle" data-toggle="collapse"
                aria-expanded="false" aria-controls="collapseMainSearchForm">
                <i class="fa fa-search"></i>
                <i class="fa fa-close"></i>
            </a>
            @endif
        </nav>
        @yield('breadcrumb')
        @if (Route::getCurrentRoute()->uri() != '/')
        @include('site.layouts.collapse-search')
        @endif
    </div>
</div>


