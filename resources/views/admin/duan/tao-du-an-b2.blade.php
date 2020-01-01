@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/fileinput.css') }}">
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
                <h4 class="mt-0 header-title">Tạo dự án bước 2</h4>
                <form action="{{ route('luu-du-an-b2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger bg-danger text-white" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    @if(Session::has('duanid'))
                    <input type="hidden" name='duanid' value='{{ Session::get('duanid')}}'>
                    @endif
                    <label for="input-location" class=" col-sm-12 col-form-label">Bài viết:</label>
                <textarea name="bai_viet" class="summernote">{{old('dai_viet')}}</textarea>
                <div class='mt-5' id="hinh">
                    <label class=" col-sm-12 col-form-label">Thư viện hình ảnh:</label>
                    <div class="file-loading">
                        <input id="file-1" type="file" name="file" multiple class="file"
                            data-overwrite-initial="false" data-min-file-count="2">
                    </div>
                </div>
                <p class="text-center mt-5">
                    <button class="btn btn-lg btn-success waves-light " type="submit">Hoàn thành</button>
                </p>
            </form>
            </div>
        </div>
    </div>
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

var url_origin = window.location.origin,
    duan_id = document.getElementsByName('duanid')[0].value;
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/upload-du-an-images",
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