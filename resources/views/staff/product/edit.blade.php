@extends('layouts.backend.app')

@section('title','product')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('staff.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               CHỈNH SỬA SẢN PHẨM 
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name"  value="{{$product->name}}">
                                        <label class="form-label">Tên Sản Phẩm</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="weight" class="form-control" name="weight" value="{{$product->weight}}">
                                        <label class="form-label">Khối Lượng (Kg)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="price" class="form-control" name="price" value="{{$product->price}}">
                                        <label class="form-label">Giá (Nghìn Đồng)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="quantity" class="form-control" name="quantity" value="{{$product->quantity}}">
                                        <label class="form-label">Số Lượng (Cái)</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="image[]" multiple>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" id="publish" class="filled-in" name="status" value="1" 
                                        {{$product->status == true ? 'checked': ''}} >
                                    <label for="publish">Đăng bán</label>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="category">Chọn Danh Mục</label>
                                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($categories as $category)
                                        <option 
                                            @foreach ($product->categories as $productCategory)
                                                {{$productCategory->id == $category->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                    <label for="tag">Chọn Nhãn Dán</label>
                                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($tags as $tag)
                                        <option 
                                            @foreach ($product->tags as $productTag)
                                                {{$productTag->id == $tag->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('warehouse') ? 'focused error' : '' }}">
                                    <label for="warehouse">Chọn Kho Hàng</label>
                                    <select name="warehouse" id="warehouse" class="form-control show-tick">
                                        @foreach($warehouses as $warehouse)
                                        <option 
                                            {{$product->warehouse_id == $warehouse->id ?'selected' : ''}}
                                            value="{{ $warehouse->id }}">{{ $warehouse->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('staff.product.index') }}">TRỞ LẠI</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               MÔ TẢ SẢN PHẨM
                            </h2>
                        </div>
                        <div class="body">
                        <textarea id="tinymce" name="about">{{$product->about}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
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