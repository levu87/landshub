<div class="topbar">
    <div class="topbar-left">
        <a href="{{ url('/') }}" target="_blank" class="logo">
            <span>
                <img src="{{ URL::asset('assets/client/img/logo1.png') }}" alt="" height="35">
            </span>
            <i>
                <img src="{{ URL::asset('fav.png') }}" alt="" height="50">
            </i>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="dropdown notification-list d-none d-md-block">
                <form role="search" class="app-search">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ URL::asset(Auth::User()->avt) }}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i>Đăng
                            xuất</a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block">
                    <a class="btn btn-light " target="_blank" href="{{ url('/') }}" role="button" id="dropdownMenuLink">
                        Trang chủ
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>