@extends('layouts.backend.app')

@section('title','Người dùng')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH NGƯỜI DÙNG
                            <span class="badge bg-blue">{{$users->count()}}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Phân Loại</th>
                                    <th>Trạng thái </th>
                                    <th>Ngày Tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Phân Loại</th>
                                    <th>Trạng thái </th>
                                    <th>Ngày Tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>{{ $user->phone}}</td>
                                            <td>{{  App\Helpers\Template::role($user->role_id) }}</td>
                                            <td>{{  App\Helpers\Template::status($user->status) }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class ="text-center">
                                                <a href="{{ route('master.user.edit', $user->id)}} " class= "btn btn-info waves-effect m-r-5">
                                                    <i class ="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('master.user.show', $user->id)}} " class= "btn btn-success waves-effect m-r-5">
                                                    <i class ="material-icons">visibility</i>
                                                </a>
                                                <button class= "btn btn-danger waves-effect m-r-5" type="button" onclick="deleteuser({{ $user->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $user->id }}" action=" {{ route('master.user.destroy', $user->id)}}" method="POST" style="display: none;">
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
        function deleteuser(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger m-r-5'
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