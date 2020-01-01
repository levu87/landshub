@extends('site.layouts.master')
@section('title', 'Trang chủ')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('header-css')has-dark-background @endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1 class="center">
            Tìm kiếm ngôi nhà bạn yêu thích
        </h1>
    </div>
</div>
<form class="hero-form form" method="POST" id="header-search">
    <div class="container">
        
        <div class="main-search-form mb-3">
            <div class="form-row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="what" class="col-form-label">Tìm kiếm?</label>
                        <input name="keyword" type="text" class="form-control small" id="what"
                            placeholder="Tìm sản phẩm bạn mong muốn?">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="category" class="col-form-label">Danh mục?</label>
                        {{-- <select name="category" id="category" class="small" data-placeholder="Select Category">
                            <option value="">Dự án</option>
                            <option value="1">Thuê</option>
                            <option value="2">Bán</option>
                        </select> --}}
                        <div class="select">
							<div class="custom-sl">
								<select class="select-css">
									<option value="1">Sắp xếp theo</option>
									<option value="2">mới nhất</option>
									<option value="3">giá cao nhất</option>
								</select>
							</div>
						</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <button type="submit" class="btn btn-primary width-100 small">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="background">
    <div class="background-img">
        <img src="{{URL::asset('assets/client/img/bg_banner.jpg')}}" alt="">
    </div>
</div>
@endsection

@section('content')
{{-- <section class="block">
    <div class="container">
        <h2>Dự án nổi bật</h2>
        <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-2-items">
            @foreach ($duans as $duan)
            <div class="item">
                <div class="wrapper">
                    <div class="image">
                        <h3>
                            <a href="{{ url('/du-an') }}" class="tag category">Dự án</a>
                            <a href="{{ url('/du-an/chi-tiet/1') }}" class="title">{{$duan->tieu_de}}</a>
                        </h3>
                        <a href="{{ route('du-an-chi-tiet', ['id'=>$duan->id]) }}" class="image-wrapper background-image">
                            <img src="{{$duan->anh_dai_dien}}" alt="">
                        </a>
                    </div>
                    <h4 class="location">
                        <a href="javascript:void(0)">{{$duan->dia_chi}}</a>
                    </h4>
                    <div class="meta">
                        <figure>
                            <i class="fa fa-calendar-o"></i>{{$duan->created_at}}
                        </figure>
                    </div>
                    <div class="description">
                        <p>{{$duan->mo_ta_ngan}}</p>
                    </div>
                    <a href="{{ route('du-an-chi-tiet', ['id'=>$duan->id]) }}" class="detail text-caps underline">Chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<section class="home-project clearfix">
    <div class="container"> 
        <h2 class="main-title">Dự án tiêu biểu</h2>
        <div class="list-item"> 
            @foreach ($duans as $duan)
            <div class="item"> 
                <div class="img"> <img src="{{$duan->anh_dai_dien}}" alt=""></div>
                <div class="title-first"><a href="{{ url('/du-an/chi-tiet/1') }}">{{$duan->tieu_de}}</a></div>
                <a href="{{ url('/du-an') }}" class="promotion"> <span>Dự án</span></a>
                <div class="caption"> 
                    <div class="title"> <a href="{{ url('/du-an/chi-tiet/1') }}">{{$duan->tieu_de}}</a></div>
                    <div class="brief-content"> 
                        <p>{{$duan->mo_ta_ngan}}</p>
                    </div><a class="viewdetail" href="{{ route('du-an-chi-tiet', ['id'=>$duan->id]) }}" class="detail text-caps underline">chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="home-news">
    <div class="container"> 
        <h2 class="main-title">Tin vừa đăng </h2>
        <div class="row list-item">
            @foreach ($baidangs as $baidang)
            <div class="col-lg-4 col-md-6 col-sm-12 item">
                <figure> 
                    <div class="img"> <img src="{{$baidang->anh_dai_dien}}" alt="">
                        <a href="{{$baidang->danh_muc==0?url('/thue'):url('/ban')}}" class="promotion{{$baidang->danh_muc==0?'':'ban'}}">{{$baidang->danh_muc==0?'Thuê':'Bán'}}</a>
                        <div class="location"> <em class="mdi mdi-map-marker-outline"></em>{{str_limit($baidang->dia_chi, $limit = 50, $end = '...')}}</div><a class="button-compare" href="javascript:void(0)"> <em class="mdi mdi-repeat"></em><span>So sánh</span></a>
                    </div>
                    <figcaption> 
                        
                        <a class="title" href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}">
                            {{$baidang->tieu_de}}
                        </a>
                        <div class="price">{{$baidang->gia}} {{$baidang->don_vi}}</div>
                        <div class="brief-content"> 
                            <p>{{$baidang->mo_ta_ngan}}</p>
                        </div>
                        <div class="caption-bottom">
                            <div class="created-date"> <em class="mdi mdi-calendar"></em>{{$baidang->created_at}}</div>
                            <div class="viewdetail"> <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}">chi tiết</a></div>
                        </div>
                        <div class="info"> 
                            <div class="poster"> 
                                @foreach ($users as $user)
                            <div class="img"> <img src="{{$user->avt}}" alt=""></div><span>{{$user->name}}</span>
                            </div><a class="contact" href="tel:{{$user->phone}}">liên hệ</a>
                                @endforeach
                                
                        </div>
                    </figcaption>
                </figure>
            </div>
        @endforeach
        </div>
        <div class="view-more"><a href="javascript:void(0)">Xem thêm</a></div>
        </div>
</section>

{{-- <section class="block">
    <div class="container">
        <h2>Tin vừa đăng</h2>
        <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
            @foreach ($baidangs as $baidang)
            <div class="item">
                <div class="wrapper">
                    <div class="image">
                        <h3>
                            <a href="{{$baidang->danh_muc==0?url('/thue'):url('/ban')}}" class="tag category {{$baidang->danh_muc==0?'':'ban'}}">{{$baidang->danh_muc==0?'Thuê':'Bán'}}</a>
                            <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="title">{{$baidang->tieu_de}}</a>
                        </h3>
                        <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="image-wrapper background-image">
                            <img src="{{$baidang->anh_dai_dien}}" alt="">
                        </a>
                    </div>
                    <h4 class="location">
                        <a href="javascript:void(0)">{{str_limit($baidang->dia_chi, $limit = 50, $end = '...')}}</a>
                    </h4>
                    <div class="price">{{$baidang->gia}} {{$baidang->don_vi}}</div>
                    <div class="meta">
                        <figure>
                            <i class="fa fa-calendar-o"></i>{{$baidang->created_at}}
                        </figure>
                    </div>
                    <div class="description">
                        <p>{{$baidang->mo_ta_ngan}}</p>
                    </div>
                    <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="detail text-caps underline">Chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<section class="home-utilities" style="background: #fff"> 
    <div class="container"> 
        <h2 class="main-title">Mua bán thật dễ dàng với LandsHub</h2>
        <div class="row list-item"> 
            <div class="col-lg-3 col-6 item"> 
                <figure> 
                    <div class="cicre"> <em class="mdi mdi-account"> </em><span>25</span></div>
                    <figcaption> 
                        <h4>Tạo tài khoản </h4>
                        <p>Quyết định đưa ra sau khi tìm hiểu thị trường, các thủ tục, thuế & chi phí, mức sinh lời...</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-lg-3 col-6 item"> 
                <figure> 
                    <div class="cicre"> <em class="mdi mdi-upload"></em><span>50</span></div>
                    <figcaption> 
                        <h4>Đăng tin quảng bá </h4>
                        <p>Nhà của bạn được hiển thị lên các kênh quảng bá với đầy đủ thông tin cùng hình ảnh chất lượng cao, chuyên nghiệp.</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-lg-3 col-6 item"> 
                <figure> 
                    <div class="cicre"> <em class="mdi mdi-thumb-up"></em><span>100</span></div>
                    <figcaption> 
                        <h4>Liên hệ</h4>
                        <p>Với lợi thế về công nghệ cùng với đội ngũ chuyên viên chuyên nghiệp, Chúng tôi là sự lựa chọn tốt nhất cho bạn.</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-lg-3 col-6 item"> 
                <figure> 
                    <div class="cicre"> <em class="mdi mdi-wallet-outline"></em><span>500</span></div>
                    <figcaption> 
                        <h4>Hoàn tất giao dịch</h4>
                        <p>Đàm phán với khách có nhu cầu, chốt giá và cùng hoàn tất các thủ tục, giấy tờ theo quy định.</p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="partners-brand">
    <div class="container">
        <h2 class="main-title">Đối tác </h2>
        <div class="main-wrapper">
            <div class="brand-list-wrapper">
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a1.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a2.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a3.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a4.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a5.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a6.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a7.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a8.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a9.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a10.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a11.png')}}" alt=""></div>
                        </figure></a></div>
                <div class="item"><a href="">
                        <figure>
                            <div class="ic" style="height: 150px;"><img src="{{URL::asset('assets/client/img/a12.png')}}" alt=""></div>
                        </figure></a></div>
            </div>
        </div>
    </div>
</section>


{{-- <section class="block">
    <div class="container">
        <div class="block">
            <h2>Mua Bán Thật Dễ Dàng Với LandsHub</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-box">
                        <figure>
                            <img src="{{ URL::asset('front/icons/feature-user.png') }}" alt="">
                            <span>1</span>
                        </figure>
                        <h3>Tạo tài khoản</h3>
                        <p>Quyết định đưa ra sau khi tìm hiểu thị trường, các thủ tục, thuế & chi phí, mức sinh lời...</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <figure>
                            <img src="{{  URL::asset('front/icons/feature-upload.png') }}" alt="">
                            <span>2</span>
                        </figure>
                        <h3>Đăng tin và quảng bá</h3>
                        <p>Nhà của bạn được hiển thị lên các kênh quảng bá với đầy đủ thông tin cùng hình ảnh chất lượng cao, chuyên nghiệp.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <figure>
                            <img src="{{ URL::asset('front/icons/feature-like.png') }}" alt="">
                            <span>3</span>
                        </figure>
                        <h3>Liên hệ</h3>
                        <p>Với lợi thế về công nghệ cùng với đội ngũ chuyên viên chuyên nghiệp, Chúng tôi là sự lựa chọn tốt nhất cho bạn.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <figure>
                            <img src="{{ URL::asset('front/icons/feature-wallet.png') }}" alt="">
                            <span>4</span>
                        </figure>
                        <h3>Hoàn tất giao dịch</h3>
                        <p>Đàm phán với khách có nhu cầu, chốt giá và cùng hoàn tất các thủ tục, giấy tờ theo quy định.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="background" data-background-color="#fff"></div>
</section>
--}}
{{-- <section class="block">
    <div class="container">
        <div class="box has-dark-background">
            <div class="row align-items-center justify-content-center d-flex">
                <div class="col-md-10 py-5">
                    <h2>Liên hệ tư vấn miễn phí</h2>
                    <form class="form email">
                        <div class="form-row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="newsletter_category" class="col-form-label">Nhu cầu?</label>
                                    <select name="newsletter_category" id="newsletter_category">
                                        <option selected value="0">Thuê</option>
                                        <option value="1">Bán</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <label for="newsletter_email" class="col-form-label">Email</label>
                                    <input name="newsletter_email" type="email" class="form-control"
                                        id="newsletter_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                    <label class="invisible">.</label>
                                    <button type="submit" class="btn btn-primary width-100"><i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="background">
                <div class="background-image">
                    <img src="{{ URL::asset('front/img/hero-background-image-01.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="block">
    <div class="container">
        <div class="d-flex align-items-center justify-content-around">
            <a href="#">
                <img src="{{ URL::asset('/front/img/agribank_logo.png') }}" alt="">
            </a>
            <a href="#">
                <img src="{{ URL::asset('/front/img/bidv_logo.png') }}" alt="">
            </a>
            <a href="#">
                <img src="{{ URL::asset('/front/img/sacombank_logo.png') }}" alt="">
            </a>
            <a href="#">
                <img src="{{ URL::asset('/front/img/vietcombank_logo.png') }}" alt="">
            </a>
            <a href="#">
                <img src="{{ URL::asset('/front/img/vietinbank_logo.png') }}" alt="">
            </a>
        </div>
    </div>

</section>  --}}
@endsection
@section('script')
<script src="{{ URL::asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
@section('script-bottom')
<script>
    var cat = $('#category').val();
    $('#category').on('change', function () {
        cat = $(this).val();
    });
    $('#what').on('keyup', function() {
        var search = $(this).serialize();
        if ($(this).val() == '') {
            $('#suggest').hide();
        } else {
            $('#suggest').show();
            $.ajax({
                url:'/tim-kiem',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {
                    'cat': cat,
                    'keyword' :$(this).val()
            },
            })
            .done(function(res) {
                // console.log(res);
                $('.suggest-list').html('');
                for (let index = 0; index < res.length; index++) {
                    $('.suggest-list').append('<li><a href="#">'+res[index].tieu_de+'</a></li>')
                }
            })
        };
    });
 </script>
@endsection