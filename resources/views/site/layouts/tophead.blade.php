
    <div class="header__top">
        <div class="container">
            <div class="wrapper">
                <div class="call"> <em class="mdi mdi-phone"> </em>0399.508.877 </div>
                <div class="button-account">
                    @if(Auth::check())
                    <div class="account-after"><a href="javascript:void(0)" class="user">
                            <div class="img"><img src="{{ Auth::user()->avt}}" alt=""></div>
                            <p>{{ Auth::user()->name }}</p>
                        </a>
                        <ul class="list-item">
                            <li> <a href="{{ url('/dang-xuat') }}">Đăng xuất</a></li>
                            <li> <a href="{{ url('/tai-khoan') }}">Profile</a></li>
                                @if (Auth::user()->role == 0)
                                <li>
                                    <a href="{{ url('/admin') }}">
                                        Admin
                                    </a>
                                </li>
                                @endif
                        </ul>
                    </div>

                    @if(Auth::user()->password == '')
                    <div id="Modal3" style="display: none;max-width:900px;">
                        <div class="sign-up">

                            <div>
                                <h2 class="sign-up__title">Cập nhật mật khẩu</h2>
                                <form action="updatepass" method="post">
                                    @csrf
                                    <input class="sign-up__inp" name="password" type="password" placeholder="Mật khẩu"
                                        required="required">
                                    @if($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                    <input class="sign-up__inp" name="re_password" type="password"
                                        placeholder="Nhập lại mật khẩu" required="required">
                                    @if($errors->has('re_password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('re_password') }}
                                    </div>
                                    @endif
                                    <div class="right-w3l">
                                        <input type="submit" class="form-control" value="Cập nhật">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    @endif
                    @else
                    <a class="register" href="#" data-target="#register" data-toggle="modal"> <em class="mdi mdi-account-plus-outline"></em>Đăng ký</a>
                    <a class="login" href="#" data-target="#login" data-toggle="modal"> <em class="mdi mdi-login-variant"></em>Đăng nhập </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
