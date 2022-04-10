@extends('layouts.backend.app')

@section('title','Vận chuyển')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.ship.update', $ship->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('users') ? 'focused error' : '' }}">
                                    <label for="user">Chọn Shipper</label>
                                    <select name="user" id="user" class="form-control show-tick">
                                        @foreach($users as $user)
                                            <option {{$ship->user_id == $user->id ? 'selected' : ''}} 
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('orders') ? 'focused error' : '' }}">
                                    <label for="order">Chọn Đơn Hàng</label>
                                    <select name="order" id="order" class="form-control show-tick">
                                        @foreach($orders as $order)
                                            @if(!($order->ship) || $order->ship->id == $ship->id)
                                            <option 
                                                {{$ship->order_id == $order->id ? 'selected' : ''}}
                                            value="{{ $order->id }}">{{ $order->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('warehouses') ? 'focused error' : '' }}">
                                    <label for="status">Tình trạng vận chuyển</label>
                                    <select name="status" id="status" class="form-control show-tick">
                                    @php
                                        $status = App\Helpers\Template::checkStatus($ship->status);
                                    @endphp
                                    {!! $status!!}
                                    </select> 
                                </div> 
                            </div>

                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="note" class="form-control" name="note" value="{{$ship->note}}">
                                        <label class="form-label">Ghi chú</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('master.ship.index') }}">TRỞ LẠI</a>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">LƯU</button>
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
    </script>

@endpush