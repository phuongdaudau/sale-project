@extends('layouts.backend.app')

@section('title','Kho hàng')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('master.warehouse.create') }}">
                <i class="material-icons">add</i>
                <span>Thêm Kho Hàng Mới</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH KHO HÀNG
                            <span class="badge bg-blue">{{$warehouses->count()}}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Mã Kho</th>
                                    <th>Tên</th>
                                    <th>Vị Trí</th>
                                    <th>Loại</th>
                                    <th>Số Lượng SP</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày Tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Mã Kho</th>
                                    <th>Tên</th>
                                    <th>Vị Trí</th>
                                    <th>Loại</th>
                                    <th>Số Lượng SP</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày Tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($warehouses as $key=>$warehouse)
                                        <tr>
                                            <td>{{ $warehouse->id }}</td>
                                            <td>{{ $warehouse->name }}</td>
                                            <td>{{ $warehouse->address }}</td>
                                            
                                            @if ($warehouse->type =="1")
                                                <td> Kho Sản Phẩm </td> 
                                            @else
                                                <td> Kho Đơn Hàng</td>   
                                            @endif

                                            @if ($warehouse->type =="2")
                                                <td>{{ $warehouse->orders->count()}} </td> 
                                            @else
                                                <td>{{ $warehouse->products->count()}}</td>   
                                            @endif
                                            
                                            <td>
                                                @if ($warehouse->status== false)
                                                    <span class="badge bg-blue">Còn Trống</span>
                                                @else
                                                    <span class="badge bg-pink">Full</span>
                                                @endif
                                            </td>
                                            <td>{{ $warehouse->created_at }}</td>
                                            <td class ="text-center">
                                                <a href="{{ route('master.warehouse.edit', $warehouse->id)}} " class= "btn btn-info waves-effect">
                                                    <i class ="material-icons">edit</i>
                                                </a>
                                                <button class= "btn btn-danger waves-effect" type="button" onclick="deletewarehouse({{ $warehouse->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $warehouse->id }}" action=" {{ route('master.warehouse.destroy', $warehouse->id)}}" method="POST" style="display: none;">
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
        function deletewarehouse(id){
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