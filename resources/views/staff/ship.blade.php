
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
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($ships as $key=>$ship)
                                        <tr>
                                            <td>{{ $ship->id }}</td>
                                            <td> {{ $ship->user->name}}</td>
                                            <td><a href="{{ route('staff.order.show', $ship->order_id)}} "> {{ $ship->order_id}} </a></td>
                                            <td>{{ App\Helpers\Template::checkStatusShip($ship->status)}}</td>
                                            <td>{{ $ship->created_at }}</td>
                                            <td>{{ $ship->updated_at }}</td>
                                            <td>{{ $ship->note }}</td>
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
