@extends('layouts.frontend.app')

@section('title','Home')

@push('css')
<!-- Bootstrap Core Css -->
<link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('assets/backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('assets/backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="{{ asset('assets/backend/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('assets/backend/css/themes/all-themes.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/frontend/img/bc.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$user[0]['name']}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <a href="./index.html">Tài Khoản</a>
                            <span>{{$user[0]['name']}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="product spad">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{ Storage::disk('public')->url('profile/'. $user[0]['image']) }}" alt="Customer Image" />
                            </div>
                            <div class="content-area">
                                <h3>{{$user[0]['username']}}</h3>
                                <p>{{App\Helpers\Template::role($user[0]['role_id'])}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Tổng đơn</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Sản Phẩm Đã Xem</span>
                                    <span>1.201</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Đơn Hàng Của Bạn</a></li>
                                    <li role="presentation" class=""><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true">Thông Tin Cá Nhân</a></li>
                                    <li role="presentation" class=""><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Thay Đổi Mật Khẩu</a></li>
                                </ul>

                                <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="../../images/user-lg.jpg" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">Marc K. Hammond</a>
                                                        </h4>
                                                        Shared publicly - 26 Oct 2018
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <img src="../../images/profile-post-image.jpg" class="img-responsive" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>12 Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>5 Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="../../images/user-lg.jpg" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">Marc K. Hammond</a>
                                                        </h4>
                                                        Shared publicly - 01 Oct 2018
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <iframe width="100%" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>125 Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>8 Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form action="{{ route('customer.update', $user[0]['id']) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Họ và Tên</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Surname" value="{{$user[0]['name']}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user[0]['email']}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-sm-2 control-label">SĐT</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$user[0]['phone']}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="about" class="col-sm-2 control-label">Giới Thiệu</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="about" class="form-control" id="about" name="about" placeholder="about" value="{{$user[0]['about']}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="about" class="col-sm-2 control-label">Ảnh Đại Diện</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                    <input type="file" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">CẬP NHẬT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="change_password_settings">
                                        <form method="POST" action="{{ route('customer.password.update') }}" class="form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Mật Khẩu Cũ</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="old_password" name="OldPassword" placeholder="Nhập mật khẩu cũ" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Mật Khẩu Mới</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="passworrd" name="NewPassword" placeholder="Nhập mật khẩu mới" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Mật Khẩu Mới (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="confirm_password" name="NewPasswordConfirm" placeholder="Nhập mật khẩu mới (Confirm)" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">CẬP NHẬT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                                                    
</section>
@endsection

@push('js')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

@endpush