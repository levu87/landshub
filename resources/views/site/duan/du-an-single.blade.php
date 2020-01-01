@foreach ($datas as $data)
@extends('site.layouts.master')
@section('title', $data['tieu_de'])
@section('css')
<link rel="stylesheet" href="{{ URL::asset('front/css/owl.carousel.min.css') }}" type="text/css">
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Dự án {{$data['tieu_de']}}</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container clearfix">
        <div class="float-left float-xs-none">
            <h1>{{$data['tieu_de']}}
            </h1>
            <h4 class="location">
                <a href="#">{{$data['dia_chi']}}</a>
            </h4>
        </div>
        <div class="float-right float-xs-none price">
            <div class="id opacity-50">
                <strong>ID: </strong>{{$data['id']}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="project-detail"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-9">
                <h2 class="main-title">Hình ảnh</h2>
                <div class="project-gallery"> 
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper"> 
                            @foreach ($images as $image1)
                            <div class="swiper-slide"><img src="{{ URL::asset($image1->image) }}" alt="" data-hash="{{$image1->id}}"></div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"><em class="lnr lnr-chevron-left"></em></div>
                        <div class="swiper-button-next"><em class="lnr lnr-chevron-right"></em></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper"> 
                            @foreach ($images as $image2)
                            <div class="swiper-slide"><img src="{{ URL::asset($image2->image)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="description"> 
                    <h2 class="main-title">Mô tả</h2>
                    <p>{{$data['mo_ta_ngan']}}</p>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="infomation">
                            <h2 class="main-title">Thông tin chi tiết</h2>
                            <div class="contain">
                                <table class="table"> 
                                    <tbody>
                                        <tr> 
                                            <td>Ngày đăng  </td>
                                            <td>{{$data['created_at']}}</td>
                                        </tr>
                                        <tr> 
                                            <td>Người Đăng</td>
                                            <td>{{$data['name']}}</td>
                                        </tr>
                                        <tr> 
                                            <td>Địa chỉ</td>
                                        <td>{{$data['dia_chi']}}</td>
                                        </tr>
                                        <tr> 
                                            <td>diện tích </td>
                                            <td>200</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="maps"> 
                    <h2 style="margin-bottom: 3rem">Bản đồ</h2>
                    <div class="map height-300px" id="map-small"></div>
                </div>
                    </div>
                </div>
                
                
                <div class="about"> 
                    <h2 class="main-title">Giới thiệu </h2>
                    <div class="full-content">
                        {!! $data['bai_viet'] !!}
                    </div>
                </div>
                <section>
                    <h2 class="main-title" style="margin-bottom: 3rem">Liên hệ người đăng</h2>
                    <div class="box">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="author">
                                    <div class="author-image">
                                        <div class="background-image">
                                            <img src="{{ URL::asset('front/img/admin.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="author-description">
                                        <h3>Admin</h3>
                                        <div class="rating" data-rating="4"></div>
                                    </div>
                                </div>
                                <hr>
                                <dl>
                                    <dt>Số điện thoại</dt>
                                    <dd>830-247-0930</dd>
                                    <dt>Email</dt>
                                    <dd>admin@landshub.me</dd>
                                </dl>
                            </div>
                            <div class="col-md-7">
                                <form class="form email">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Họ tên</label>
                                        <input name="name" type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="col-form-label">Lời nhắn</label>
                                        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 other-project">
                <h2 class="main-title">Thuộc dự án</h2>
                <div class="list-item"> 
                    @foreach ($baidangs as $baidang)
                    <div class="item">
                        <figure> 
                            <div class="img"> <img src="{{ URL::asset($baidang->anh_dai_dien) }}" alt="">
                                <a href="{{$baidang->danh_muc==0?url('/thue'):url('/ban')}}" class="promotion {{$baidang->danh_muc==0?'':'ban'}}">{{$baidang->danh_muc==0?'Thuê':'Bán'}}</a>
                                <div class="location"> <em class="mdi mdi-map-marker-outline"></em>{{$baidang->dia_chi}}</div><a class="button-compare" href="javascript:void(0)"> <em class="mdi mdi-repeat"></em><span>So sánh</span></a>
                            </div>
                            <figcaption> <a class="title" href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}">{{$baidang->tieu_de}} </a>
                                <div class="price">{{$baidang->gia}} <span>{{$baidang->don_vi}}</span> </div>
                                <div class="caption-bottom">
                                    <div class="created-date"> <em class="mdi mdi-calendar"></em>{{$baidang->created_at}}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('front/js/owl.carousel.min.js') }}"></script>
@endsection
@section('script-bottom')
<script>
    var latitude = {{$data['lat']}};
    var longitude = {{$data['lng']}};
    var markerImage = '{{ url('/front/img/map-marker.png') }}';
    var mapTheme = "light";
    var mapElement = "map-small";
    simpleMap(latitude, longitude, markerImage, mapTheme, mapElement);
</script>
@endsection
@endforeach