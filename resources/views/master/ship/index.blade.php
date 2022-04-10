@extends('layouts.backend.app')

@section('title','Vận Chuyển')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
    <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('master.ship.create') }}">
                <i class="material-icons">add</i>
                <span>Thêm Đơn Vận Chuyển</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ĐƠN VẬN CHUYỂN 
                            <span class="badge bg-blue">{{$ships->count()}}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tài xế</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th>Ghi Chú</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tài xế</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th>Ghi Chú</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($ships as $key=>$ship)
                                        <tr>
                                            <td>{{ $ship->id }}</td>
                                            <td><a href="{{ route('master.user.show', $ship->user_id)}} "> {{ $ship->user->name}} </a></td>
                                            <td><a href="{{ route('master.order.show', $ship->order_id)}} "> {{ $ship->order_id}} </a></td>
                                            <td>{{ App\Helpers\Template::checkStatusShip($ship->status)}}</td>
                                            <td>{{ $ship->created_at }}</td>
                                            <td>{{ $ship->updated_at }}</td>
                                            <td>{{ $ship->note }}</td>
                                            <td class ="text-center">
                                                <a href="{{ route('master.ship.edit', $ship->id)}} " class= "btn btn-info waves-effect">
                                                    <i class ="material-icons">edit</i>
                                                </a>
                                                <button class= "btn btn-danger waves-effect" type="button" onclick="deleteship({{ $ship->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $ship->id }}" action=" {{ route('master.ship.destroy', $ship->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteship(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
              
              swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  event.preventDefault();
                  document.getElementById('delete-form-'+id).submit();
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                  )
                }
              })
        }
    </script>
@endpush