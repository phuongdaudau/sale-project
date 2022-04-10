
@extends('layouts.backend.app')

@section('title','Thống kê')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
        <div class="block-header">
            <h2>THỐNG KÊ</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="{{route('master.order.index')}}">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG ĐƠN HÀNG</div>
                        <div class="number count-to" data-from="0" data-to="{{ $order_count }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="{{route('master.product.index')}}">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">favorite</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG SẢN PHẨM</div>
                        <div class="number count-to" data-from="0" data-to="{{ $product_count }} " data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="{{route('master.warehouse.index')}}">
                <div class="info-box bg-red hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG KHO HÀNG</div>
                        <div class="number count-to" data-from="0" data-to="{{ $warehouse_count }} " data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="{{route('master.user.index')}}">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG KHÁCH HÀNG</div>
                        <div class="number count-to" data-from="0" data-to="{{ $customer_count }} " data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div></a>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="info-box bg-pink hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">apps</i>
                    </div>
                    <div class="content">
                        <div class="text">DANH MỤC</div>
                        <div class="number count-to" data-from="0" data-to="{{ $category_count }} " data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">labels</i>
                    </div>
                    <div class="content">
                        <div class="text">NHÃN DÁN</div>
                        <div class="number count-to" data-from="0" data-to="{{ $tag_count }} " data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
                <div class="info-box bg-purple hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">KHÁCH HÀNG MỚI</div>
                        <div class="number count-to" data-from="0" data-to="{{ $new_customers_today }} " data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
                <div class="info-box bg-deep-purple hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">fiber_new</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG NHÂN VIÊN</div>
                        <div class="number count-to" data-from="0" data-to="{{ $staff_count + $shipper_count }}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                <div class="card">
                    <div class="header">
                        <h2>TOP SẢN PHẨM BÁN CHẠY</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>MÃ</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>QTY</th>
                                        <th>Đã Bán</th>
                                        <th>Lượt Xem</th>
                                        <th>Kho Hàng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($best_sale_products as $key=>$product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($product->name,'20') }}</td>
                                            <td>{{  number_format($product->price) }},000</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->orders_count }}</td>
                                            <td>{{ $product->view_count }}</td>
                                            <td> {{ $product->warehouse->name}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{  route('master.product.show', $product->id) }}">View</a>
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
        <!-- #END# Widgets -->

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TOP 10 ACTIVE AUTHOR</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Name</th>
                                    <th>products</th>
                                    <th>Comments</th>
                                    <th>Favorite</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
        </div>
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
