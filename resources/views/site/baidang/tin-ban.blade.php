@extends('site.layouts.account')
@section('title', 'Tin bán')
@section('css')
<link href="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Tin bán</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Tin rao bán</h1>
        {{session('cost_id')}}
    </div>
</div>
@endsection
@section('content')
<div class="section-title clearfix">
    {{-- <div class="float-left float-xs-none">
        <label class="mr-3 align-text-bottom">Xắp xếp: </label>
        <select name="sorting" id="sorting" class="small width-200px" data-placeholder="Default Sorting">
            <option value="">Mới nhất</option>
            <option value="1">Cũ nhất</option>
        </select>
    </div> --}}
    <div class="float-right d-xs-none ">
            <a href="{{ url('/tao-tin-ban') }}" class="btn btn-primary ">Tạo Tin</a>
    </div>

</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success mb-5" role="alert">
    {{ $message }}
    </div>
@endif
<div class="items list compact grid-xl-3-items grid-lg-2-items grid-md-2-items">
    @foreach ($posts as $item)    
    <div class="item">
        @if ($item->pay== 1)
        <div class="ribbon-featured"><div class="ribbon-start"></div><div class="ribbon-content">Quảng cáo</div><div class="ribbon-end"><figure class="ribbon-shadow"></figure></div></div>
        @endif
        <div class="wrapper">
            <div class="image">
                <h3>
                    <a href="#" class="tag category {{$item->danh_muc==0?'':'ban'}}">{{$item->danh_muc==0?'Thuê':'Bán'}}</a>
                    <a href="{{ route('chi-tiet', ['id'=>$item->id]) }}" target="_blank" class="title">{{substr_replace($item->tieu_de,'',100)}}</a>
                    <span class="tag {{$item->status== 0 ? 'chua-ban':''}}">{{$item->status== 0 ? 'Chưa bán':'Đã bán'}}</span>
                    <span class="tag {{$item->public== 1 ? 'da-duyet':''}}">{{$item->public== 0 ? 'Chờ duyệt':'Đã duyệt'}}</span>
                </h3>
                <a href="{{ route('chi-tiet', ['id'=>$item->id]) }}" class="image-wrapper background-image">
                    <img src="{!! $item->anh_dai_dien !!}" alt="">
                </a>
            </div>
            <h4 class="location">
                <a href="javascript:void(0)">{{ substr_replace($item->dia_chi,'...', 50)}}</a>
            </h4>
        <div class="price">{{$item->gia}} {{$item->don_vi}}</div>
            <div class="admin-controls">
                <a href="{{ route('sua-tin-ban-b1', ['id'=>$item->id]) }}">
                    <i class="fa fa-pencil"></i>Sửa
                </a>
                <form action="{{ route('xoa-tin')}}" id="del-duan{{$item->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="del_id" value="{{$item->id}}">
                    <button onclick="xoa({{$item->id}})" type="button"  class="tin-ban-xoa remove">
                        <i class="fa fa-trash" ></i>Xóa
                    </button>
                </form>
                {{-- <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form{{$item->id}}').submit();" id='quangcao' class="">
                    <i class="fa fa-bullhorn"></i>Đã bán
                </a> --}}
                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('pay-form{{$item->id}}').submit();" id='quangcao' class="">
                    <i class="fa fa-money"></i>Trả phí
                </a>
                <form id="pay-form{{$item->id}}" action="{{ route('tao-don-hang') }}" method="POST" style="display: none;">
                    <input type="hidden" value="{{$item->id}}" name="id_post">
                        @csrf
                </form>
            </div>
            <div class="description">
                <p>{{$item->mo_ta_ngan}}</p>
            </div>
            <a href="{{ route('chi-tiet', ['id'=>$item->id]) }}" target="_blank" class="detail text-caps underline">Xem</a>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection
@section('script')
<script src="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script >
    function xoa(id) {
                Swal.fire({
                    title: "Bạn có muốn xóa bài viết này?",
                    text: "Hành động này không thể hoàn tác",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#02a499",
                    cancelButtonColor: "#ec4561",
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Hủy"
                    }).then(function (result) {
                        if (result.value) {
                            document.getElementById('del-duan'+id).submit();
                        }
                });
            }
</script>
@endsection
{{-- @section('modal')
<div class="modal fade bd-example-modal-lg" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gridModalLabel">Grids in modals</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="container-fluid bd-example-row">
                <div class="row">
                  <div class="col-md-4">.col-md-4</div>
                  <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
                </div>
                <div class="row">
                  <div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
                  <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
                </div>
                <div class="row">
                  <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
                </div>
                <div class="row">
                  <div class="col-sm-9">
                    Level 1: .col-sm-9
                    <div class="row">
                      <div class="col-8 col-sm-6">
                        Level 2: .col-8 .col-sm-6
                      </div>
                      <div class="col-4 col-sm-6">
                        Level 2: .col-4 .col-sm-6
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
    </div>
  </div>
@endsection --}}