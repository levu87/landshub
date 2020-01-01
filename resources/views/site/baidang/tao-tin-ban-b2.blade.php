@extends('site.layouts.account')
@section('title', 'Tạo Tin bán')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css') }}"><link rel="stylesheet" href="{{ URL::asset('assets/css/fileinput.css') }}">
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Tạo Tin bán</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Tạo Tin bán</h1>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <form class="form form-submit" method="POST" action="{{ route('tao-tin-ban-b2') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='ads_id' value='{{ Session::get('ads_id')}}'>
        <section>
            <h2>Bài viết giới thiệu</h2>
            <div class="form-group">
                <textarea name="bai_viet" required class="summernote">{{old('mo_ta_ngan')}}</textarea>
            </div>
        </section>
        <section>
            <h2>Mô tả ngắn</h2>
            <div class="form-gourp">
            <textarea name="mo_ta_ngan" required id="details" class="form-control" rows="4">{{old('mo_ta_ngan')}}</textarea>
            </div>
        </section>
        <section>
            <div class='mt-5' id="hinh">
                <h2>Thư viện hình ảnh:</h2>
                <div class="file-loading">
                    <input id="file-1" type="file" name="file" multiple class="file"
                        data-overwrite-initial="false" data-min-file-count="2">
                </div>
            </div>
        </section>
        <section class="clearfix">
            <div class="form-group">
                <button type="submit" class="btn btn-primary large icon float-right">Đăng tin<i
                        class="fa fa-chevron-right"></i></button>
            </div>
        </section>
    </form>
    <!--end form-submit-->
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/fileinput.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/locales/vi.js') }}"></script>
<script src="{{ URL::asset('assets/js/themes/fa/theme.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/piexif.min.js') }}"></script>
<script src="{{ URL::asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
@section('script-bottom')
<script>
$(document).ready(function () {
    $('.summernote').summernote({
        height: 500,
        minHeight: null,
        maxHeight: null,
        dialogsInBody: true
    });
});
var  url_origin = window.location.origin,
    ads_id = document.getElementsByName('ads_id')[0].value;
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/upload-ads-images",
        uploadExtraData: function() {
            return {
                _token: '{!! csrf_token() !!}',
                id_duan: ads_id
            };
        },
        allowedFileExtensions: ['jpg', 'png'],
        overwriteInitial: false,
        language: "vi",
        initialPreviewAsData: true, 
        initialPreviewFileType: 'image',
        maxFileSize:2000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
</script>
@endsection