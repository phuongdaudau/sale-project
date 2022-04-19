@extends('layouts.backend.app')

@section('title','Phí vận chuyển')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('users') ? 'focused error' : '' }}">
                                    <label for="user">Tỉnh thành</label>
                                    <select name="city" id="city" class="form-control show-tick" data-live-search="true" onchange="javascript:loadDistrict(this.value)">
                                        <option value="0">Chọn tỉnh thành</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('users') ? 'focused error' : '' }}">
                                    <label for="user">Quận huyện</label>
                                    <div class="load-district">
                                        <select name="district" id="district" class="form-control show-tick" data-live-search="true">
                                            
                                                <option value="0">Chọn quận huyện</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('users') ? 'focused error' : '' }}">
                                    <label for="user">Xã phường</label>
                                    <div class="load-commune">
                                    <select name="commune" id="commune" class="form-control show-tick" data-live-search="true">
                                        
                                            <option value="0">Chọn xã phường</option>
                                        
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <label for="user">Phí vận chuyển</label>
                                        <input type="text" id="note" class="form-control" name="note">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <a  class="btn btn-danger m-t-15 waves-effect" href="#">TRỞ LẠI</a>
            <button type="button" name="add_delivery" class="btn btn-primary m-t-15 waves-effect add_delivery">THÊM PHÍ VẬN CHUYỂN</button>
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

@endpush