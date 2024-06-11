
@extends('layouts.backend.app')

@section('title','Cập nhật đơn hàng')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.user.updateRole', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('role_id') ? 'focused error' : '' }}">
                                    <label for="role_id">Phân quyền người dùng</label>
                                    <select name="role_id" id="role_id" class="form-control show-tick">
                                    @php
                                        $role = App\Helpers\Template::checkRole($user->role_id);
                                    @endphp
                                    {!! $role!!}
                                    </select> 
                                </div>
                                <div class="m-t-15 form-line {{ $errors->has('status') ? 'focused error' : '' }}">
                                    <label for="status">Trạng thái </label>
                                    <select name="status" id="status" class="form-control show-tick">
                                        @php
                                            $status= App\Helpers\Template::checkStatus($user->status);
                                        @endphp
                                        {!! $status!!}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a  class="btn btn-danger m-t-15 m-r-5 waves-effect" href="{{ route('master.user.index') }}">TRỞ LẠI</a>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">LƯU</button>
        </form>
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
