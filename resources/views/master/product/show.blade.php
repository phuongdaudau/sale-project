@extends('layouts.backend.app')

@section('title','Bài viết')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('master.product.index') }}" class="btn btn-danger waves-effect">QUAY LẠI</a>
        @if ($product->is_approved == false)
            <button type="button" class="btn btn-success waves-effect pull-right m-b-15" onclick="approveproduct({{ $product->id }})">
                <i class="material-icons">done</i>
                <span>DUYỆT BÀI VIẾT</span>
            </button>
            <form method="POST" action="{{ route('master.product.approve',$product->id) }}" id="approval-form" style="display: none">
                @csrf
                @method('PUT')
            </form>
        @else
            <button type="button" class="btn btn-success pull-right m-b-15" disabled>
                <i class="material-icons">done</i>
                <span>XÁC NHẬN</span>
            </button>
        @endif
        <br> <br>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                {{$product->name}}
                                
                                </h1>
                                <small>Người tạo:  <strong><a href="">{{$product->user->name }}</a></strong>
                                    vào {{ $product->created_at->toFormattedDateString()}}
                                </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-indigo">
                            <h2>
                                Mô tả ngắn
                            </h2>
                        </div>
                        <div class="body">
                            {!! $product->description !!}
                        </div>
                    </div>
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>
                            Nội dung bài viết
                        </h2>
                    </div>
                    <div class="body">
                    {!! $product->about !!}
                    </div>
                </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                Danh Mục
                            </h2>
                        </div>

                        <div class="body">
                            <span class="label bg-cyan" style="font-size: 16px">{{ $categories[$product->category_id] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Nhãn dán
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($product->tags as $tag)
                                <span class="label bg-green" style="font-size: 16px">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if ($product->status == 1)
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header bg-green">
                                <h2>
                                    Link bài viết nội bộ
                                </h2>
                            </div>
                            <div class="body">
                                <a href="{{ route('product.details', $product->slug)}}" target="_blank">{{ $product->name  }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ẢNH BÌA
                            </h2>
                        </div>
                        <div class="body">
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{ url($product->image) }}" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="{{ url($product->image) }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        function approveproduct(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You went to approve this product!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('approval-form').submit();
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'The product remain pending :)',
                    'info'
                )
                }
            })
        }

    </script>

@endpush