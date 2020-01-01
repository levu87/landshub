@extends('site.layouts.account')
@section('title', 'Sửa Tin Bán')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Sửa Tin bán</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Sửa Tin bán</h1>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <form class="form form-submit" method="POST" action="{{ route('luu-sua-tin-ban-b1') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$ads->id}}" name="ads_id">
        <section>
            <h2>Thông tin cơ bản</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="col-form-label ">Tiêu đề</label>
                    <input name="title" value='{{$ads->tieu_de}}' type="text" class="form-control" id="title">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="col-form-label ">Giá</label>
                    <input name="price" value="{{$ads->gia}}" type="number" class="form-control" id="price">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="col-form-label ">Đơn vị</label>
                        <div class="selects">
                            <select name="don_vi"  id="don_vi">
                            @if ($ads->don_vi==='Tỷ')
                            <option value="Tỷ" selected>Tỷ</option>
                            <option value="Triệu" >Triệu</option>
                            @else
                            <option value="Tỷ" >Tỷ</option>
                            <option value="Triệu" selected>Triệu</option>
                            @endif
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="col-form-label ">Tình trạng</label>
                        <div class="selects">
                            <select name="tinh_trang"  id="tinh_trang">
                            @if ($ads->status==0)
                            <option value="0" selected>Chưa bán</option>
                            <option value="1" >Đã Bán</option>
                            @else
                            <option value="0" selected>Chưa bán</option>
                            <option value="1" >Đã Bán</option>
                            @endif
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="danh-muc" class="col-form-label required">Danh mục</label>
                        <div class="selects">
                            <select name="danh_muc"  id="danh-muc">
                            @if ($ads->danh_muc == 0)
                            <option value="0" selected>Thuê</option>
                            <option value="1">Bán</option>
                            @else
                            <option value="0">Thuê</option>
                            <option value="1" selected>Bán</option>
                            @endif
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="du-an" class="col-form-label">Dự án</label>
                        <div class="selects">
                            <select name="du_an" required id="du-an" data-placeholder="Select">
                            @foreach ($du_an_items as $du_an)
                            @if ($ads->id_du_an == $du_an->id)
                            <option value="{{$du_an->id}}" selected>{{$du_an->tieu_de}}</option>
                            @else
                            <option value="{{$du_an->id}}">{{$du_an->tieu_de}}</option>
                            @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="input-location" class="col-form-label">Địa chỉ</label>
                <input name="dia_chi"  type="text" class="form-control" id="input-location"
            value="{{$ads->dia_chi}}">
                <span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top"
                    title="Find My Position"><i class="fa fa-map-marker"></i></span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Bản đồ</label>
                    <div class="map height-400px" id="map-submit"></div>
                <input name="latitude" value='{{$ads->lat}}' type="text" class="form-control" id="latitude" hidden>
                <input name="longitude" type="text" value="{{$ads->lng}}" class="form-control" id="longitude" hidden>
                </div>
                <div class="col-md-6">
                    <label>Ảnh đại diện</label>
                    <div class="profile-image ">
                        <div class="image background-image thubmnail" >
                        <img src="{{URL::asset($ads->anh_dai_dien)}}" alt="">
                        </div>
                        <div class="single-file-input">
                            <input type="file" id="user_image" name="anh_dai_dien">
                            <div class="btn btn-framed btn-primary small">Ảnh đại diện</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h2>Thông tin liên hệ</h2>
            <a href="{{ url('/tai-khoan') }}">Chỉnnh sửa</a>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" value="{{Auth::user()->id}}" name="id_user">
                        <label for="name" class="col-form-label required">Họ tên</label>
                        <input name="name" type="text" disabled class="form-control" id="name" placeholder="Name"
                            value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="col-form-label required">Email</label>
                        <input name="email" disabled type="email" class="form-control" id="email" placeholder="Email"
                            value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="col-form-label required">Số điện thoại</label>
                        <input name="phone" type="text" disabled class="form-control" id="phone" placeholder="Phone"
                            value="{{Auth::user()->phone}}">
                    </div>
                </div>
            </div>
        </section>
        <section class="clearfix">
            <div class="form-group">
                <button type="submit" class="btn btn-primary large icon float-right">Tiếp tục<i
                        class="fa fa-chevron-right"></i></button>
            </div>
        </section>
    </form>
</div>
@endsection
@section('script')

@endsection
@section('script-bottom')
<script>
    var latitude = {{ $ads->lat? $ads->lat :51.511971}};
    var longitude ={{ $ads->lng ? $ads->lng :51.511971}};
    var markerImage = '{{ url('/front/img/map-marker.png') }}';
    var mapTheme = "light";
    var mapElement = "map-submit";
    var markerDrag = true;
    simpleMap(latitude, longitude, markerImage, mapTheme, mapElement, markerDrag);
</script>
@endsection