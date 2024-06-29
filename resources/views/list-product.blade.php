@extends('layouts.frontend.app')

@section('title','Tài khoản')
@push('css')
    <style>
        .content-home {
        background: #fff;
        box-shadow: 0 0px 2px rgba(0, 0, 0, 0.2);
        min-height: 500px;
        margin-top: 15px;
        margin-top: 75px;
        padding: 25px;
        }
        .content-home .dashboard-left {
            padding: 25px !important;
            text-align: center;
            border: 0.5px solid #c4c4c4;
        }
        @media screen and (max-width: 992px) {
            .content-home .dashboard-left .avt {
                width: 100%;
                height: 100%;
            }
        }
        @media screen and (min-width: 768px) {
        .col-md-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%;
        }
            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
        }
        .content-home .dashboard-right .introduce {
            margin-bottom: 25px;
        }

        .content-home .dashboard-left .avt {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        .content-home .dashboard-left .statistical {
            display: flex;
            flex-wrap: unset;
            justify-content: space-between;
            padding-top: 20px;
        }
        @media screen and (max-width: 992px) {
            .content-home .dashboard-right .tilte {
                width: 50%!important;
            }
        }

        .content-home .dashboard-right .tilte {
            font-family: Arial;
            font-weight: 700;
            line-height: 37px;
            color: #252525;
            font-size: 26px;
            width: 30%;
            border-bottom: 0.8px solid #d6d6d6;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
            margin-top: 20px;
        }
        .content-home article {
            border-bottom: solid 0.5px #e5e5e5;
            padding-bottom: 20px;
            display: flow-root;
            margin-bottom: 20px;
        }
        h3.title-news {
            margin: 0;
            font-size: unset;
        }
        .content-home article a.first-view {
            width: 35%;
            display: block;
            float: left;
            padding-right: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }.content-home article a.first-view {
             width: 35%;
             display: block;
             float: left;
             padding-right: 20px;
         }
        @media screen and (max-width: 768px) {
            .content-home article a.first-view {
                width: 100%;
                padding-right: 0;
            }
        }

        @media screen and (max-width: 768px) {
            .content-home article .info-post {
                width: 100% !important;
                padding-top: 15px;
            }
        }

        .content-home article .info-post {
            width: 65%;
            float: right;
            flex-direction: column-reverse;
            display: flex;
        }
        .content-home article .info-post .wrap {
            margin-top: 0px;
        }
        .content-home article .info-post .wrap .auth {
            width: fit-content;
            color: #828282;
            font-size: 15px;
            float: left;
        }
        .content-home article .info-post .wrap .auth img {
            width: 23px !important;
            height: 23px !important;
            float: left;
            object-fit: cover;
            border-radius: 50% !important;
            margin-right: 5px;
        }

        .content-home article img {
            max-width: 100%;
            height: auto;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        .content-home article .info-post .wrap .social {
            width: fit-content;
            color: #0d4689;
            align-items: center;
            justify-content: end;
            font-size: 15px;
            text-align: right;
            float: right;
        }

        .icon-wrap {
            display: flex;
            flex-direction: row;
            width: fit-content;
            float: right;
        }
        .content-home .dashboard-right .tilte::after {
            position: absolute;
            width: 150px;
            height: 2px;
            background: #2a649c;
            content: "";
            left: 0;
            bottom: -1px;
        }
        *, ::after, ::before {
            box-sizing: border-box;
        }
        .content-home .dashboard-right .tilte {
            font-family: Arial;
            font-weight: 700;
            line-height: 37px;
            color: #252525;
            font-size: 26px;
            width: 30%;
            border-bottom: 0.8px solid #d6d6d6;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
            margin-top: 20px;
        }
        .content-home .dashboard-left .statistical strong {
            font-family: Arial;
            font-size: 32px;
            font-weight: 700;
            line-height: 37px;
            color: #252525;
        }
        .icon-modify {
            font-size: 15px;
            border-radius: 20px;
            border: 1px solid #2a649c;
            padding: 3px 15px;
            color: #2a649c;
            display: flex;
            justify-content: center;
            width: 50px;
            margin-left: 10px;
        }
        .mr-15 {
            margin-right: 15px;
        }
    </style>
@endpush
@section('content')
    </div><div class="container content-home">
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard-left">
                    <img src="{{ $user->image ? url($user->image) : asset('assets/frontend/img/default-ava.png') }}" alt="" class="avt">
                    <h4>{{ $user->name }}</h4>
                    <p> @user{{ $user->id }}</p>
                    <div class="statistical">
                        <div class="statistical-item">
                            <strong>0</strong>
                            <p>Lượt like</p>
                        </div>
                        <div class="statistical-item">
                            <strong>{{ $user->products->count() }}</strong>
                            <p>Bài viết</p>
                        </div>
                        <div class="statistical-item">
                            <strong>0</strong>
                            <p>Bình luận</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard-right">
                    <div class="introduce">
                        <h4 class="tilte">Giới thiệu</h4>
                        @if($user->about)
                        <div class="dashboard-content"> {!! $user->about !!} </div>
                        @else
                        <div class="dashboard-content"> Không có thông tin giới thiệu. </div>
                        @endif
                    </div>
                    <div class="news">
                        <h4 class="tilte">Bài viết</h4>

                        @php
                            $products = $user->products;
                        @endphp
                        @if($products->count() > 0)
                            @foreach($products as $product)
                                <article>
                                    <h3 class="title-news">
                                        <a href="#" class="title"> {{ $product->name }}  </a>
                                    </h3>
                                    <a href="#" class="first-view">
                                        <img loading="lazy" class=" lazyloaded" src="{{ $product->image ? url($product->image) : asset('assets/frontend/img/default-thumb.jpg') }}" alt="uploads/news_web/2024/03/16/ctck-1710584872.png" width="450px" height="260px">
                                    </a>
                                    <div class="info-post">
                                        <div class="wrap">
                                            <div class="auth">
                                                <img loading="lazy" class=" ls-is-cached lazyloaded" src="{{  $user->image ? url( $user->image) : asset('assets/frontend/img/default-ava.png') }}">
                                                <span>
                                          <a href="{{ route('product.list', $user->id) }}"> {{ $user->name }}  </a>
                                        </span>
                                                <span> - {{ App\Helpers\Template::displayElapsedTime($product->created_at) }}  </span>
                                            </div>
                                            <div class="social icon-wrap">
                                                <div class="ic" data-toggle="modal" data-target="#loginModal" data-id="21417">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#e8eaed"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                                    <span class="count-heart">2</span>
                                                </div>
                                                <div class="ic ic-comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#e8eaed"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                                                    <span class="count-cmt">0</span>
                                                </div>
                                                @if(Auth::check() && $user->id == Auth::user()->id && $product->is_approved == 0)
                                                <a class="icon-modify" href="{{ route('customer.product.update', $product->id) }}">
                                                    <span class="material-icons"> mode_edit </span>
                                                </a>
                                                <a class="icon-modify" onclick="deleteproduct({{ $product->id }})">
                                                    <span class="material-icons"> delete </span>
                                                </a>
                                                    <form id="delete-form-{{ $product->id }}" action=" {{ route('customer.product.delete', $product->id)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="#">
                                            <p class="desc text-3">{{ $product->description }}</p>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <div class="dashboard-content"> Không có bài viết. </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/node-waves/waves.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/backend/js/admin.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('assets/backend/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
        @endif
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteproduct(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-15'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Bạn có chắc muốn xóa?',
                text: "Bạn sẽ không thể lấy lại dữ liệu nếu xóa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Có',
                cancelButtonText: 'Không',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Đã hủy',
                        'Dữ liệu của bạn vẫn nguyên vẹn!',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush