@extends('site.layouts.master')
@section('title', 'Dự án')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Dự án</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Dự án</h1>
    </div>
</div>
@endsection
@section('content')
<section class="block">
        <div class="container">
            <div class="list-product"> 
					<div class="title-sort"> 
                        <div class="div"></div>
					
						<div class="filter-buttons">
							<div class="grid-view-button active"><em class="fas fa-th"></em></div>
							<div class="list-view-button"><em class="fas fa-list-ul"></em></div>
						</div>
					</div>
					<ol class="list grid-view-filter">
                        @foreach ($datas as $data)
						<li> 
							<div class="item">
								<figure> 
									<div class="img"> <img src="{{$data->anh_dai_dien}}" alt="">
										<a href="{{ url('/du-an') }}" class="promotion">Dự án </a>
										<div class="location"> <em class="mdi mdi-map-marker-outline"></em>{{$data->dia_chi}}</div><a class="button-compare" href="javascript:void(0)"> <em class="mdi mdi-repeat"></em><span>So sánh</span></a>
									</div>
									<figcaption> <a class="title" href="{{ url('/du-an/chi-tiet/1') }}">{{$data->tieu_de}}</a>
										{{-- <div class="price">1 triệu</div> --}}
										<div class="brief-content"> 
                                            <p>{{$data->mo_ta_ngan}}</p>
										</div>
										<div class="caption-bottom">
											<div class="created-date"> <em class="mdi mdi-calendar"></em>{{$data->created_at}}</div>
											<div class="viewdetail"> <a href="{{ route('du-an-chi-tiet', ['id'=>$data->id]) }}">chi tiết</a></div>
										</div>
										<div class="info"> 
											<div class="poster"> 
                                            <div class="img"> <img src="{{ URL::asset('assets/client/img/logo.png') }}" alt=""></div><span>lê bá vũ </span>
											</div><a class="contact" href="">liên hệ</a>
										</div>
									</figcaption>
								</figure>
                            </div>
						</li>
                        @endforeach
					</ol>
			</div>
            {{ $datas->links() }}
        </div>
    </section>
@endsection
@section('script')

@endsection