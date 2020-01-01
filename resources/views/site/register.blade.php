@extends('site.layouts.master')
@section('title', 'Đăng ký')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Đăng ký</a></li>
</ol>
@endsection
@section('hero')
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <h1>Đăng ký</h1>
    </div>
    <!--end container-->
</div>
<!--============ End Page Title =====================================================================-->
@endsection
@section('content')
<section class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <form class="form clearfix" method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label required">Họ và tên</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="email" class="col-form-label required">Email</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="password" class="col-form-label required">Mật khẩu</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="repeat_password" class="col-form-label required">Nhập lại mật khẩu</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <!--end form-group-->
                    <div class="d-flex justify-content-between align-items-baseline">
                        <label>
                            <input type="checkbox" name="newsletter" value="1">
                            Đăng ký nhận mail
                        </label>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
                <hr>
                <p>
                   Bằng cách nhấp vào Đăng ký, bạn đồng ý với <a href="#" class="link">Điều khoản, Chính sách của chúng tôi.</a>
                </p>
            </div>
            <!--end col-md-6-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end block-->
@endsection
@section('script')

@endsection