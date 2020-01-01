@extends('site.layouts.master')
@section('title', 'Bán')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Bán</a></li>
</ol>
@endsection
@section('hero')
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <h1>Bán</h1>
    </div>
</div>
@endsection
@section('content')
<section class="block">
        <div class="container">
            <div class="section-title clearfix">
                {{-- <div class="float-left float-xs-none">
                    <label class="mr-3 align-text-bottom">Sort by: </label>
                    <select name="sorting" id="sorting" class="small width-200px" data-placeholder="Default Sorting" >
                        <option value="">Default Sorting</option>
                        <option value="1">Newest First</option>
                        <option value="2">Oldest First</option>
                        <option value="3">Lowest Price First</option>
                        <option value="4">Highest Price First</option>
                    </select>

                </div> --}}
                <div class="float-right d-xs-none thumbnail-toggle">
                    <a href="#" class="change-class active" data-change-from-class="list" data-change-to-class="grid" data-parent-class="items">
                        <i class="fa fa-th"></i>
                    </a>
                    <a href="#" class="change-class" data-change-from-class="grid" data-change-to-class="list" data-parent-class="items">
                        <i class="fa fa-th-list"></i>
                    </a>
                </div>
            </div>
            <!--============ Items ==========================================================================-->
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @foreach ($datas as $baidang)
                <div class="item">
                    <div class="wrapper">
                        <div class="image">
                            <h3>
                                <a href="{{$baidang->danh_muc==0?url('/thue'):url('/ban')}}" class="tag category {{$baidang->danh_muc==0?'':'ban'}}">{{$baidang->danh_muc==0?'Thuê':'Bán'}}</a>
                                <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="title">{{$baidang->tieu_de}}</a>
                                {{-- <span class="tag">Offer</span> --}}
                            </h3>
                            <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="image-wrapper background-image">
                                <img src="{{$baidang->anh_dai_dien}}" alt="">
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
                            {{-- <figure>
                                <a href="#">
                                    <i class="fa fa-user"></i>Hills Estate
                                </a>
                            </figure> --}}
                        </div>
                        <!--end meta-->
                        <div class="description">
                            <p>{{$baidang->mo_ta_ngan}}</p>
                        </div>
                        <a href="{{ route('chi-tiet', ['id'=>$baidang->id]) }}" class="detail text-caps underline">Chi tiết</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $datas->links() }}
        </div>
        <!--end container-->
    </section>
@endsection
@section('script')

@endsection