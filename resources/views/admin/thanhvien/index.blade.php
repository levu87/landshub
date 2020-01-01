@extends('admin.layouts.master')

@section('css')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title">Thành viên</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Thành viên</li>
    </ol>
</div>
@endsection
@section('button')
<a href="{{ route('thanh-vien.create') }}" class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light">
    <i class="mdi mdi-pencil-outline mr-2"></i> Tạo mới
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
                <h4 class="mt-0 header-title">Quản lý các Thành viên</h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Ngày tạo</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role==0?'Admin':'Thành viên'}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <form action="{{ route('thanh-vien.destroy',$user->id) }}" id="del-user{{$user->id}}" method="POST">
                                    <a href="{{route('thanh-vien.edit',$user->id)}}"
                                        class="btn btn-primary btn-sm sua">Sửa</a>
                                    @method('DELETE')
                                    @csrf
                                    @if ($user->role!=0)
                                    <button type="button" onclick="xoa({{$user->id}})" class="btn btn-danger btn-sm xoa">Xóa</button>
                                    @endif
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
                    title: "Bạn có muốn xóa thành viên này?",
                    text: "Hành động này không thể hoàn tác",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#02a499",
                    cancelButtonColor: "#ec4561",
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Hủy"
                    }).then(function (result) {
                        if (result.value) {
                            document.getElementById('del-user'+id).submit();
                        }
                });
            }
    </script>
@endsection