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
                        THÊM MỚI DANH MỤC
                    </h2>
                </div>
                <div class="body">
                    <form action = "{{ route('master.category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name ="name">
                                <label class="form-label">Category Name</label>
                            </div>
                            <div class="m-t-15 form-line {{ $errors->has('parent_id') ? 'focused error' : '' }}">
                                <label for="parent_id">Danh mục cha </label>
                                <select name="parent_id" id="parent_id" class="form-control show-tick" data-live-search="true">
                                    @foreach($parentIds as $key => $parentId)
                                        <option value="{{ $key }}">{{ $parentId }}</option>
                                    @endforeach
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