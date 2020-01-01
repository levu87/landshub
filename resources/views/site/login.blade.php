@extends('site.layouts.master')
@section('title', 'Đăng nhập')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Đăng nhập</a></li>
</ol>
@endsection
@section('hero')
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <h1>Đăng nhập</h1>
    </div>
    <!--end container-->
</div>
<!--============ End Page Title =====================================================================-->
@endsection
@section('content')
<section class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if ($message = Session::get('error'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <form class="form clearfix" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label required">Email</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="password" class="col-form-label required">Mật khẩu</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required ">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <div class="d-flex justify-content-between align-items-baseline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Ghi nhớ
                        </label>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </form>
                <hr>
                <p>
                    Quên mật khẩu? <a href="{{ url('/quen-mat-khau') }}" class="link">Nhấn vào đây</a>
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