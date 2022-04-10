@extends('layouts.backend.app')

@section('title','Kho Hàng')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.warehouse.update', $warehouse->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               CHỈNH SỬA KHO HÀNG
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name" value="{{$warehouse->name}}">
                                        <label class="form-label">Tên Kho</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" name="address" value="{{$warehouse->address}}">
                                        <label class="form-label">Vị Trí</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('type') ? 'focused error' : '' }}">
                                    <label for="type">Chọn Loại Kho</label>
                                    <select name="type" id="type" class="form-control show-tick">
                                        <option {{$warehouse->type =='1' ? 'selected' : ''}} value="1">Kho sản phẩm</option>
                                        <option {{$warehouse->type =='2' ? 'selected' : ''}} value="2">Kho đơn hàng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('status') ? 'focused error' : '' }}">
                                    <label for="status">Chọn Trạng Thái</label>
                                    <select name="status" id="status" class="form-control show-tick">
                                        <option {{$warehouse->status =='1' ? 'selected' : ''}} value="0">Còn trống</option>
                                        <option {{$warehouse->status =='2' ? 'selected' : ''}} value="1">Đã đầy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('master.warehouse.index') }}">TRỞ LẠI</a>
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