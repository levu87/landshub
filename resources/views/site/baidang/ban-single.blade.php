@extends('site.layouts.master')
@section('title', $data->tieu_de)
@section('css')
<link rel="stylesheet" href="{{ URL::asset('front/css/owl.carousel.min.css') }}" type="text/css">
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Dự án {{$data->tieu_de}}</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container clearfix">
        <div class="float-left float-xs-none">
            <h1>{{$data->tieu_de}}
                {{-- <span class="tag">Offer</span> --}}
            </h1>
            <h4 class="location">
                <a href="#">{{$data->dia_chi}}</a>
            </h4>
        </div>
        <div class="float-right float-xs-none price">
            <div class="number">{{$data->gia}} {{$data->don_vi}}</div>
            <div class="id opacity-50">
                <strong>ID: </strong>{{$data->id}}
            </div>
        </div>
    </div>
    <!--end container-->
</div>
@endsection
@section('content')
<section class="block">
    <div class="container">
        <div class="row">
            <!--============ Listing Detail =============================================================-->
            <div class="col-md-9 ">
                <!--Gallery Carousel-->
                <section>
                    <h2>Hình ảnh</h2>
                    <!--end section-title-->
                    <div class="gallery-carousel owl-carousel">
                        @foreach ($images as $image1)
                        <img src="{{ URL::asset($image1->image) }}" alt="" data-hash="{{$image1->id}}">
                        @endforeach
                    </div>
                    <div class="gallery-carousel-thumbs owl-carousel">
                        @foreach ($images as $image2)
                        <a href="#{{$image2->id}}" class="owl-thumb active-thumb background-image">
                            <img src="{{ URL::asset($image2->image)}}" alt="">
                        </a>
                        @endforeach
                    </div>
                </section>
                <!--end Gallery Carousel-->
                <!--Description-->
                <section>
                    <h2>Mô tả</h2>
                    <p>
                        {{$data->mo_ta_ngan}}
                    </p>
                </section>
                <!--end Description-->
                <!--Details & Location-->
                <section>
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Thông tin</h2>
                            <dl>
                                <dt>Ngày đăng</dt>
                                <dd>{{$data->created_at}}</dd>
                                <dt>Diện tích</dt>
                                <dd>300</dd>
                                <dt>Trình trạng</dt>
                                <dd>Mới</dd>
                                <dt>Phòng ngủ</dt>
                                <dd>Có</dd>
                                <dt>Bếp</dt>
                                <dd>Có</dd>
                                <dt>View</dt>
                                <dd>Biển</dd>
                            </dl>
                        </div>
                        <div class="col-md-8">
                            <h2>Bản đồ</h2>
                            <div class="map height-300px" id="map-small"></div>
                        </div>
                    </div>
                </section>
                <!--end Details and Locations-->
                <section>
                    <div class="row ">
                        <div class="col-md-12">
                            <h2>Giới thiệu</h2>
                            <div class="blog-post-content box">
                                {!! $data->bai_viet !!}
                            </div>
                        </div>
                    </div>
                </section>
                <!--Author-->
                <section>
                    <h2>Liên hệ người đăng</h2>
                    <div class="box">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="author">
                                    <div class="author-image">
                                        <div class="background-image">
                                            <img src="{{ URL::asset($nguoidang->avt) }}" alt="">
                                        </div>
                                    </div>
                                    <!--end author-image-->
                                    <div class="author-description">
                                        <h3>{{$nguoidang->name}}</h3>
                                        <div class="rating" data-rating="4"></div>
                                        {{-- <a href="seller-detail-1.html" class="text-uppercase">Show My Listings
                                            <span class="appendix">(12)</span>
                                        </a> --}}
                                    </div>
                                    <!--end author-description-->
                                </div>
                                <hr>
                                <dl>
                                    <dt>Số điện thoại:</dt>
                                    <dd>{{$nguoidang->phone}}</dd>
                                    <dt>Email:</dt>
                                    <dd>{{$nguoidang->email}}</dd>
                                </dl>
                                <div>
                                    <b>Giới thiệu:</b>
                                    <p>{{$nguoidang->tom_tat}}</p>
                                </div>
                                <!--end author-->
                            </div>
                            <!--end col-md-5-->
                            <div class="col-md-7">
                                <form class="form email">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Họ tên</label>
                                        <input name="name" type="text" class="form-control" id="name">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="message" class="col-form-label">Lời nhắn</label>
                                        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                                    </div>
                                    <!--end form-group-->
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                            </div>
                            <!--end col-md-7-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end box-->
                </section>
                <!--End Author-->
            </div>
            <!--============ End Listing Detail =========================================================-->
            <!--============ Sidebar ====================================================================-->
            <div class="col-md-3">
                <aside class="sidebar">
                    <section>
                        <h2>Liên quan</h2>
                        <div class="items compact">
                            @foreach ($baidangs as $baidang)
                            <div class="item">
                                  @if ($baidang->pay== 1)
                                  <div class="ribbon-featured">Hot</div>
                                @endif
                                <div class="wrapper">
                                    <div class="image">
                                        <h3>
                                            <a href="{{$baidang->danh_muc==0?url('/thue'):url('/ban')}}"
                                                class="tag category {{$baidang->danh_muc==0?'':'ban'}}">{{$baidang->danh_muc==0?'Thuê':'Bán'}}</a>
                                            <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}"
                                                class="title">{{$baidang->tieu_de}}</a>
                                          
                                        </h3>
                                        <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}"
                                            class="image-wrapper background-image">
                                            <img src="{{ URL::asset($baidang->anh_dai_dien) }}" alt="">
                                        </a>
                                    </div>
                                    <!--end image-->
                                    <h4 class="location">
                                        <a href="javascript:void(0)">{{$baidang->dia_chi}}</a>
                                    </h4>
                                    <div class="price">{{$baidang->gia}} {{$baidang->don_vi}}</div>
                                    <div class="meta">
                                        <figure>
                                            <i class="fa fa-calendar-o"></i>{{$baidang->created_at}}
                                        </figure>
                                    </div>
                                    <!--end meta-->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </aside>
            </div>
            <!--============ End Sidebar ================================================================-->
        </div>
    </div>
    <!--end container-->
</section>
@endsection
@section('script')
<script src="{{ URL::asset('front/js/owl.carousel.min.js') }}"></script>
@endsection
@section('script-bottom')
<script>
    var latitude = {{$data->lat}};
        var longitude = {{$data->lng}};
        var markerImage = '{{ url('/front/img/map-marker.png') }}';
        var mapTheme = "light";
        var mapElement = "map-small";
        simpleMap(latitude, longitude, markerImage, mapTheme, mapElement);
</script>
@endsection