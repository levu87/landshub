@extends('admin.layouts.master')
@section('css')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title">Thuê/Bán</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Thuê/Bán</li>
    </ol>
</div>
@endsection
@section('button')
<a href="{{ url('/tao-tin-ban') }}" target="_blank" class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light">
    <i class="mdi mdi-pencil-outline mr-2"></i> Tạo tin
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

                <h4 class="mt-0 header-title">Quản lý bài viết </h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Người đăng</th>
                            <th>Trạng thái</th>
                            <th>Trả phí</th>
                            <th>Ngày đăng</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adss as $key=>$ads)
                            <td>{{$key}}</td>
                            <td><a href="{{ url('/du-an/chi-tiet',$ads->id) }}" target="_blank">
                                {{ substr_replace($ads->tieu_de,'...', 50)}}
                            </a></td>
                            <td class="text-center">
                                {{$ads->name}}
                            </td>
                            <td>{{ $ads->public== 0 ?'Chưa duyệt':'Đã duyệt'}}</td>
                            <td>{{ $ads->pay== 0 ?'0':'Quảng cáo'}}</td>
                            <td>{{$ads->created_at}}</td>
                            <td class="d-flex">
                                @if ($ads->public== 0)
                                <a href="{{ route('ad-duyet', ['id'=>$ads->id]) }}" class="btn btn-info btn-sm mr-1">Duyệt</a>
                                @endif
                                <form action="{{ route('xoa-tin-ad')}}" id="del-duan{{$ads->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="del_id" value="{{$ads->id}}">
                                    <button onclick="xoa({{$ads->id}})" type="button"  class="btn btn-danger btn-sm xoa">Xóa
                                    </button>
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
            $(document).ready(function() {
        $('#datatable').DataTable();
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['colvis']
        });
        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );
    </script>
@endsection