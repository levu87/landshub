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
                        @foreach ($bans as $ban)
						<li> 
							<div class="item">
								<figure> 
									<div class="img"> <img src="{{$ban->anh_dai_dien}}" alt="">
										<a href="{{ url('/ban') }}" class="promotion">Bán</a>
										<div class="location"> <em class="mdi mdi-map-marker-outline"></em>{{$ban->dia_chi}}</div><a class="button-compare" href="javascript:void(0)"> <em class="mdi mdi-repeat"></em><span>So sánh</span></a>
									</div>
									<figcaption> <a class="title" href="{{ route('chi-tiet', ['id'=>$ban->id]) }}">{{$ban->tieu_de}}</a>
									<div class="price">{{$ban->gia}} <span>{{$ban->don_vi}}</span></div>
										<div class="brief-content"> 
                                            <p>{{$ban->mo_ta_ngan}}</p>
										</div>
										<div class="caption-bottom">
											<div class="created-date"> <em class="mdi mdi-calendar"></em>{{$ban->created_at}}</div>
											<div class="viewdetail"> <a href="{{ route('chi-tiet', ['id'=>$ban->id]) }}">chi tiết</a></div>
										</div>
										<div class="info"> 
											<div class="poster"> 
												@foreach ($user as $users)
                                            <div class="img"> <img src="{{$users->avt}}" alt=""></div><span>{{$users->name}}</span>
											</div><a class="contact" href="tel:{{$users->phone}}">liên hệ</a>
											@endforeach
										</div>
									</figcaption>
								</figure>
                            </div>
						</li>
                        @endforeach
					</ol>
			</div>
            {{ $bans->links() }}
        </div>
    </section>
@endsection
@section('script')

@endsection