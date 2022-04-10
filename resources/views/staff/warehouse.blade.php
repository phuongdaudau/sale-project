
@extends('layouts.backend.app')

@section('title','Thống kê')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
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
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="assets/backend/plugins/flot-charts/jquery.flot.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="assets/backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush
