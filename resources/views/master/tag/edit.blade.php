@extends('layouts.backend.app')
@section('title', 'Tag')

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
                        CHỈNH SỬA NHÃN
                    </h2>
                </div>
                <div class="body">
                    <form action = "{{ route('master.tag.update', $tag->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-line {{ $errors->has('hot_tag') ? 'focused error' : '' }}">
                            <label for="hot_tag">Phân loại nhãn</label>
                            <select name="hot_tag" id="hot_tag" class="form-control show-tick">
                                @php
                                    $tag = App\Helpers\Template::hotTag($tag->hot_tag);
                                @endphp
                                {!! $tag!!}
                            </select>
                        </div>
                        <a class="btn btn-danger m-t-35 waves-effect" href="{{ route('master.tag.index')}}">BACK</a>
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