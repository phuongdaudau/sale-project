@extends('layouts.backend.app')

@section('title','Bài viết')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               CHỈNH SỬA BÀI VIẾT
                            </h2>
                        </div>
                        <div class="body">
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Tên bài viết </label>
                                    <input type="text" id="name" class="form-control" name="name" maxlength="165" value="{{$product->name}}">
                                </div>
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Mô tả ngắn</label>
                                    <textarea id="description" class="count-length form-control" name="description" maxlength="255" rows="3" data-name="description" data-length="165">{{$product->description}}</textarea>
                                </div>
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Nội dung</label>
                                    <textarea id="tiny" name="about">{{$product->about}}</textarea>
                                </div>
                                <div class="m-t-15 form-line {{ $errors->has('category_id') ? 'focused error' : '' }}">
                                    <label for="category_id">Danh mục </label>
                                    <select name="category_id" id="category_id" class="form-control show-tick">
                                        @php
                                            $category= App\Helpers\Template::checkParentCat($product->categoryid, $categories);
                                        @endphp
                                        {!! $category!!}
                                    </select>
                                </div>
                                <div class="m-t-15 m-b-15 form-line">
                                    <label class="form-label">Tag bài viết </label>
                                    <input type="text" id="tags" class="form-control" name="tags" value="{{$tags}}">
                                </div>
                                <div class="form-group m-t-15">
                                    <label for="image">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="image[]" multiple>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" id="status" class="filled-in" name="status" value="1"
                                        {{$product->status == true ? 'checked': ''}} >
                                    <label for="status">Bài viết nội bộ </label>
                                </div>

                            <a  class="btn btn-danger m-t-35 m-b-15 waves-effect" href="{{ route('master.product.index') }}">TRỞ LẠI</a>
                            <button type="submit" class="btn btn-primary m-t-35 m-b-15 waves-effect">CẬP NHẬT</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
@endpush