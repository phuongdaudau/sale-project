@extends('layouts.backend.app')

@section('title','Chi Tiết Đơn Hàng')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <a href="{{ route('master.order.index') }}" class="btn btn-danger waves-effect">QUAY LẠI</a>
        @if ($order->is_approved == false)
            <button type="button" class="btn btn-success waves-effect pull-right">
                <i class="material-icons">done</i>
                <span>XÁC NHẬN</span>
            </button>
        @else
            <button type="button" class="btn btn-success pull-right" disabled>
                <i class="material-icons">done</i>
                <span>XÁC NHẬN</span>
            </button>
        @endif
        <br> <br>
        @if($order->ship)
            <div class="card card-timeline">
                <br>
                
                    @php
                        $status = App\Helpers\Template::showStatus($order->ship->status);
                    @endphp
                    {!! $status!!}
                
                <br>
            </div>
            @endif
            <div class="container-fluid">
                <div class="card">
                    <div class="header text-center">
                        <h2>
                            THÔNG TIN ĐƠN HÀNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="card">
                            <div class="header bg-indigo">
                                <h2>
                                    Địa chỉ người nhận
                                </h2>
                            </div>
                            <div class="body">
                                <p>{{$order->address}}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-teal">
                                <h2> 
                                    Danh sách sản phẩm
                                    <span class="badge bg-blue">{{$order->quantity}}</span>
                                </h2>
                            </div>
                            <div class="body" style="display: flex;">
                            @foreach ($order->products as $product)
                                @php
                                    $imgs = explode(",", $product->image);
                                    $images = array_slice($imgs,1,5);
                                @endphp
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{ route('master.product.show', $product->id)}}" data-sub-html="Demo Description">
                                            <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('product/'. $images[0]) }}">
                                        </a>
                                        <div class="text-center">
                                            <strong>{{ $product->name }}</strong>
                                            <p>{{  number_format($product->price) }},000đ</p>
                                            <p>x{{ $product->pivot->quantity }}</p>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-red">
                                <h2>
                                    Số tiền thanh toán
                                </h2>
                            </div>
                            <div class="body">
                                @php
                                    $money =$order->price;
                                    $price = number_format($money);
                                    $sum = number_format($money + 50000);
                                @endphp
                                <p>Tổng tiền hàng: {{ $price }}đ</p>
                                <p>Phí vận chuyển: 50,000đ</p>
                                <p><strong>THÀNH TIỀN: {{ $sum }}đ</strong></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Phương thức thanh toán
                                </h2>
                            </div>
                            <div class="body">
                                <p><strong>{{$order->payment}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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

        function approveorder(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You went to approve this order!",
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
                    'The order remain pending :)',
                    'info'
                )
                }
            })
        }

    </script>

@endpush