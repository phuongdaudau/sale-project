@extends('layouts.backend.app')
@section('title', 'Danh mục')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EDIT CATEGORY
                    </h2>
                </div>
                <div class="body">
                    <form action = "{{ route('master.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label for="parent_id">Tên danh mục </label>
                                <input type="text" id="name" class="form-control" name ="name" value="{{$category->name}}">
                            </div>
                            <div class="m-t-15 form-line {{ $errors->has('parent_id') ? 'focused error' : '' }}">
                                <label for="parent_id">Danh mục cha </label>
                                <select name="parent_id" id="parent_id" class="form-control show-tick">
                                    @php
                                            $parent= App\Helpers\Template::checkParentCat($category->parent_id, $parentIds);
                                    @endphp
                                    {!! $parent!!}
                                </select>
                            </div>
                        </div>
                        <a class="btn btn-danger m-t-35 waves-effect" href="{{ route('master.category.index')}}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-35 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush