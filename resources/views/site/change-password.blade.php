@extends('site.layouts.account')
@section('title', 'Đổi mật khẩu')
@section('css')
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Đổi mật khẩu</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Đổi mật khẩu</h1>
    </div>
</div>
@endsection
@section('content')
@if(session()->has('msg') && session()->has('class'))
<div class="alert alert-{{ session('class') ?? ''}} my-2 alert-dismissible" role="alert">
    {{ session('msg') ?? ''}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<form class="form" method="POST" action="{{ route('doi-mat-khau') }}">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="current_password" class="col-form-label required">Mật khẩu hiện tại</label>
                    <input type="password" class="form-control" name="old" placeholder="Current Password" required value="{{Auth::user()->plain_password}}" >
            </div>
            <!--end form-group-->
            <div class="form-group">
                <label for="new_current_password" class="col-form-label required">Mật khẩu mới</label>
                <input name="new" type="password" class="form-control" id="new_current_password"
                    required>
            </div>
            <!--end form-group-->
            <div class="form-group">
                <label for="repeat_new_current_password" class="col-form-label required">Nhập lại mật khẩu</label>
                <input name="cpass" type="password" class="form-control"
                    id="repeat_new_current_password" required>
            </div>
            <!--end form-group-->
            <button type="submit" class="btn btn-primary float-right">Đổi mật khẩu</button>
        </div>
        <!--end col-md-6-->
    </div>
</form>
@endsection
@section('script')

@endsection