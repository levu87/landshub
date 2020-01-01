@extends('admin.layouts.master')
@section('css')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

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
@section('button')
<a href="{{ url('admin/tao-du-an-b1') }}" class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light">
    <i class="mdi mdi-pencil-outline mr-2"></i> Tạo mới dự án
</a>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success bg-success text-white" role="alert">
            {{ $message }}
        </div>
         @endif
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Quản lý bài viết dự án </h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đăng</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($duans as $key=>$duan)
                            <td>{{$key}}</td>
                            <td><a href="{{ url('/du-an/chi-tiet',$duan->id) }}" target="_blank">{{$duan->tieu_de}}</a></td>
                            <td class="text-center"><img src="{{ URL::asset($duan->anh_dai_dien) }}" class="img-thumbnail" width='100px' alt=""></td>
                            <td>{{ substr_replace($duan->dia_chi,'...', 25)}}</td>
                            <td>{{$duan->created_at}}</td>
                            <td>
                                <form action="{{ route('du-an.destroy',$duan->id) }}" id="del-duan{{$duan->id}}" method="POST">
                                    <a href="{{ url('admin/sua-du-an-b1',$duan->id) }}"
                                        class="btn btn-primary btn-sm sua">Sửa</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" onclick="xoa({{$duan->id}})" class="btn btn-danger btn-sm xoa">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection
@section('script')
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['colvis']
        });
        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );
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