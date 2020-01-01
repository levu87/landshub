@extends('admin.layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title">Dự án</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Dự án</li>
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tạo dự án bước 1</h4>
                <form action="{{ route('luu-sua-du-an-b1') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger bg-danger text-white" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                        <input type="hidden" name="duan_id" value="{{$duan->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-12 col-form-label">Tiêu đề:</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" value="{{ $duan->tieu_de }}" name="tieu_de" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-12 col-form-label">Mô tả ngắn</label>
                                <div class="col-sm-12">
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                        name="mo_ta_ngan">{{ $duan->mo_ta_ngan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-location" class=" col-sm-12 col-form-label">Địa chỉ:</label>
                                <div class="col-sm-12">
                                    <input name="dia_chi" type="text" class="form-control" id="input-location"
                                        placeholder="Nhập địa chỉ trên bản đồ" value="{{ $duan->dia_chi }}">
                                </div>
                                <span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top"></span> 
                            </div>
                                <div class="map mx-3" style="height:300px" id="map-submit"></div>
                                <input name="latitude" type="text" value="{{ $duan->lat }}" class="form-control" id="latitude" hidden>
                                <input name="longitude" type="text" value="{{ $duan->lng }}"   class="form-control" id="longitude" hidden>
                        <input name="user_id" type="text" id="longitude" hidden value="{{Auth::user()->id}}">
                        </div>
                        <div class="col-md-6">
                            {{-- ảnh đại diện --}}
                            <label for="preview-thumb " class=" col-sm-12 col-form-label">Ảnh đại diện:</label>
                            <div class="anh-dai-dien">
                                <div class="image background-image-ss thubmnail" style="background-image:url({{ URL::asset($duan->anh_dai_dien) }})">
                                <img src="" alt="">
                                </div>
                                <div id="preview-thumb" class="single-file-input">
                                    <input type="file" id="user_image" name="anh_dai_dien" value="{{ old('anh_dai_dien') }}" >
                                    <div class="btn btn-outline-primary  small">Chọn</div>
                                </div>
                            </div>
                            {{-- end ảnh đại diện --}}
                        </div>
                    </div>
                        <p class="text-center mt-5">
                            <button class="btn btn-lg btn-success waves-effect waves-light " type="submit">Tiếp theo</button>
                        </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?key=AIzaSyA2Zb2vY8-t_9BUYqFFjc9LQiNWUZPLft4&libraries=places"></script>
@endsection
@section('script-bottom')
<script>
    $("#preview-thumb input[type=file]").change(function() {
        previewImage(this);
    });
    var latitude = {{ $duan->lat? $duan->lat :51.511971}};
    var longitude ={{ $duan->lng ? $duan->lng :51.511971}};
    var markerImage = '{{ url('/front/img/map-marker.png') }}';
    var mapTheme = "light";
    var mapElement = "map-submit";
    var markerDrag = true;
    simpleMap(latitude, longitude, markerImage, mapTheme, mapElement, markerDrag);
</script>
@endsection