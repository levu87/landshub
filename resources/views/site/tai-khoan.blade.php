@extends('site.layouts.account')
@section('title', 'Tài khoản')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
</ol>
@endsection
@section('hero')
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <h1>Tài khoản</h1>
    </div>
    <!--end container-->
</div>
<!--============ End Page Title =====================================================================-->
@endsection
@section('content')
<form class="form" method="POST" action="{{route('userupdate')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <h2>Thông tin cá nhân</h2>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="col-form-label required">Họ tên</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name"
                        value="{{Auth::user()->name?Auth::user()->name:''}}" required>
                        </div>
                        <!--end form-group-->
                    </div>
                    <!--end col-md-8-->
                </div>
                <!--end form-group-->
                <div class="form-group">
                    <label for="about" class="col-form-label">Giới thiệu</label>
                    <textarea name="about" id="about" class="form-control"
                        rows="4">{{Auth::user()->tom_tat?Auth::user()->tom_tat:''}}</textarea>
                </div>
                <!--end form-group-->
            </section>

            <section>
                <h2>Thông tin liên hệ</h2>
                <div class="form-group">
                    <label for="phone" class="col-form-label">Số điện thoại</label>
                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Your Phone"
                        value="{{Auth::user()->phone?Auth::user()->phone:''}}">
                </div>
                <!--end form-group-->
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input name="email" disabled type="email" class="form-control" id="email" placeholder="Your Email"
                        value="{{Auth::user()->email?Auth::user()->email:''}}">
                </div>
                <!--end form-group-->
            </section>
            <section class="clearfix">
                <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
            </section>
        </div>
        <!--end col-md-8-->
        <div class="col-md-4">
            <div class="profile-image">
                <div class="image background-image">
                    <img src="{{Auth::user()->avt?Auth::user()->avt:''}}" alt="">
                </div>
                <div class="single-file-input">
                    <input type="file" id="user_image" name="user_image">
                    <div class="btn btn-framed btn-primary small">Ảnh đại diện</div>
                </div>
            </div>
        </div>
        <!--end col-md-3-->
    </div>
</form>
@endsection
@section('script')

@endsection