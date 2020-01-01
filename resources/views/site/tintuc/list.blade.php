@extends('site.layouts.master')
@section('title', 'Tin bán')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Bán</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Bán</h1>
    </div>
</div>
@endsection
@section('content')

<section class="news-section"> 
    <div class="container">
        <div class="list-news-item clearfix">
            <div class="new-item new-item--1">
                <div class="img"> <img src="./img/ncc.png" alt=""></div>
                <div class="title"><a href="./chi-tiet-tin-tuc.html">Nhà nhập khẩu cầu chì chính hãng số 1 tại viêt nam.</a></div>
            </div>
            <div class="new-item new-item--2"> 
                <div class="img"> <img src="./img/news/2.jpg" alt=""></div>
                <div class="info"> 
                    <time>22/10/2019</time>
                    <div class="title"><a href="./chi-tiet-tin-tuc.html">Triển lãm quốc tế ngành Điện, Máy móc thiết bị Công nghiệp, Tự động hóa Việt Nam 2019 – EMA VIET NAM 2019.</a></div>
                    <div class="view-more"><a href="./chi-tiet-tin-tuc.html">Xem tất cả<em class="mdi mdi-arrow-right"></em></a></div>
                </div>
            </div>
            <div class="new-item new-item--3">
                <div class="img"> <img src="./img/news/3.jpg" alt=""></div>
                <div class="info"> 
                    <time>22/10/2019</time>
                    <div class="title"><a href="./chi-tiet-tin-tuc.html">FERRAZ SHAWMUT – Sự khác biệt công nghệ chính hãng</a></div>
                    <div class="view-more"><a href="./chi-tiet-tin-tuc.html">Xem tất cả<em class="mdi mdi-arrow-right"></em></a></div>
                </div>
            </div>
            <div class="new-item new-item--4">
                <div class="img"> <img src="./img/news/4.jpg" alt=""></div>
                <div class="info"> 
                    <time>22/10/2019</time>
                    <div class="title"><a href="./chi-tiet-tin-tuc.html">Chống sét lan truyền - Mersen được tích hợp công nghệ độc quyền</a></div>
                    <p>Hãy cùng CVC tìm hiểu về công nghệ độc quyền của riêng Mersen, nâng cao an toàn của hệ thống điện năng lượng mặt trời cho người sử dụng.</p>
                    <div class="view-more"><a href="./chi-tiet-tin-tuc.html">Xem tất cả<em class="mdi mdi-arrow-right"></em></a></div>
                </div>
            </div>
            <div class="new-item new-item--5">
                <div class="img"> <img src="./img/news/5.jpg" alt=""></div>
                <div class="info"> 
                    <time>22/10/2019</time>
                    <div class="title"><a href="./chi-tiet-tin-tuc.html">Những thông số cần quan tâm khi chọn chống sét cho điện mặt trời áp mái (Solar Roof Top)</a></div>
                    <p>Những điều cần biết khi chọn chống sét cho hệ thống năng lượng mặt trời áp mái.</p>
                    <div class="view-more"><a href="./chi-tiet-tin-tuc.html">Xem tất cả<em class="mdi mdi-arrow-right"></em></a></div>
                </div>
            </div>
            <div class="new-item new-item--6">
                <div class="img"> <img src="./img/news/6.jpg" alt=""></div>
                <div class="info"> 
                    <time>22/10/2019</time>
                    <div class="title"><a href="./chi-tiet-tin-tuc.html">Mersen mua Idealec, báo cáo tăng trưởng 50% cho kinh doanh năng lượng mặt trời</a></div>
                    <p>Ngày 19/4/2018 – Mersen, chuyên gia toàn cầu về năng lượng điện và vật liệu tiên tiến, đã hoàn tất việc mua lại Idealec, nhà thiết kế và nhà sản xuất thanh dẫn nhiều lớp.Với việc mua lại này, Mersen nhằm củng cố vị trí trên phân khúc điện lực như một nhà dẫn đầu thị trường thanh dẫn nhiều lớp và mở rộng danh mục khách hàng của mình, đặc biệt là trong lĩnh vực năng lượng và đường sắt,..</p>
                    <div class="view-more"><a href="./chi-tiet-tin-tuc.html">Xem tất cả<em class="mdi mdi-arrow-right"></em></a></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection