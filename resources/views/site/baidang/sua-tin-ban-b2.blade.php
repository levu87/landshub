@extends('site.layouts.account')
@section('title', 'Sửa tin bán bước 2')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/fileinput.css') }}">
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Sửa tin bán bước 2</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Sửa tin bán bước 2</h1>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <form class="form form-submit" method="POST" action="{{ route('luu-sua-tin-ban-b2') }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='ads_id' value='{{$ads->id}}'>
        <section>
            <h2>Bài viết giới thiệu</h2>
            <div class="form-group">
                <textarea name="bai_viet" class="summernote">{{$ads->bai_viet}}</textarea>
            </div>
        </section>
        <section>
            <h2>Mô tả ngắn</h2>
            <div class="form-gourp">
                <textarea name="mo_ta_ngan"  id="details" class="form-control"
                    rows="4">{{$ads->mo_ta_ngan}}</textarea>
            </div>
        </section>
        <section>
            <div class='mt-5' id="hinh">
                <h2>Thư viện hình ảnh:</h2>
                <div class="file-loading">
                    <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false"
                        data-min-file-count="2">
                </div>
            </div>
        </section>
        <section class="clearfix">
            <div class="form-group">
                <button type="submit" class="btn btn-primary large icon float-right">Hoàn thành<i
                        class="fa fa-chevron-right"></i></button>
            </div>
        </section>
    </form>
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
var data = <?php echo json_encode($images); ?>,
    images=[],
    imagmeta= [],
    url_origin = window.location.origin,
    duan_id = document.getElementsByName('ads_id')[0].value;
    for (let i = 0; i < data.length; i++) {
        images.push(url_origin+data[i].image);
        imagmeta.push({
            caption: data[i].orignal_filename,
            url:'/delete-ads-images',
            key:data[i].id
        });
    }
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/upload-ads-images",
        uploadExtraData: function() {
            return {
                _token: '{!! csrf_token() !!}',
                id_duan: duan_id
            };
        },
        deleteExtraData:function() {
            return {
                _token: '{!! csrf_token() !!}',
            };
        },
        allowedFileExtensions: ['jpg', 'png'],
        overwriteInitial: false,
        language: "vi",
        initialPreview:images,
        initialPreviewAsData: true, 
        initialPreviewFileType: 'image',
        initialPreviewConfig: imagmeta,
        maxFileSize:2000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
</script>
@endsection