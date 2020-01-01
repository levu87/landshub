@extends('admin.layouts.master')

@section('css')

@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title">Thành viên</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Thành viên</li>
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tạo thành viên</h4>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-white" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form action="{{route('thanh-vien.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" type="text" id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email"  id="example-email-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" id="example-password-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="plain_password" id="example-password-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quyền</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role">
                                <option value="1">Thành viên</option>
                                <option value="0">Admin</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success waves-effect waves-light" type="submit">Tạo</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('script')

@endsection