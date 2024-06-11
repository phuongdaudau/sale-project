@extends('layouts.backend.app')

@section('title','Bài viết')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               THÊM BÀI VIẾT MỚI
                            </h2>
                        </div>
                        <div class="body">
                            <div class="m-t-15 form-line">
                                <label class="form-label">Tên bài viết </label>
                                <input type="text" id="name" class="form-control" name="name" maxlength="165">
                            </div>
                            <div class="m-t-15 form-line">
                                <label class="form-label">Mô tả ngắn</label>
                                <textarea id="description" class="count-length form-control" name="description" maxlength="255" rows="3" data-name="description" data-length="165"></textarea>
                            </div>
                            <div class="m-t-15 form-line">
                                <label class="form-label">Nội dung</label>
                                <textarea id="tiny" name="about"></textarea>
                            </div>
                            <div class="m-t-15 form-line {{ $errors->has('category_id') ? 'focused error' : '' }}">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control show-tick">
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $key }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="m-t-15 m-b-15 form-line">
                                <label class="form-label">Tag bài viết </label>
                                <input type="text" id="tags" class="form-control" name="tags">
                            </div>
                            <div class="form-group m-t-15">
                                <label for="image">Hình Ảnh Sản Phẩm</label>
                                <input type="file" name="image[]" multiple>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="status" class="filled-in" name="status" value="1">
                                <label for="status">Bài viết nội bộ </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a  class="btn btn-danger m-b-15 waves-effect" href="{{ route('master.category.index') }}">TRỞ LẠI</a>
                            <button type="submit" class="btn btn-primary m-b-15 waves-effect">LƯU</button>
        </form>
    </div>
@endsection

@push('js')
@endpush