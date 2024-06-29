@extends('layouts.frontend.app')

@section('title','Tài khoản')
@push('css')
    <style>
        .accout {
            box-shadow: 0 6px 22px 0 rgb(0 0 0 / 8%);
            border: 1px solid #fff;
            border-radius: 0.45rem;
            margin: 0 auto;
            margin-top: 100px;
            margin-bottom: 50px;
            background: #fff;
            padding: 20px;
        }
        @media only screen and (min-width: 1280px) {
            .accout {
                width: 700px;
            }
        }
        .accout-title {
            text-align: center;
            font-family: "Merriweather";
            font-weight: 700;
            line-height: 33px;
            margin-bottom: 30px;
            color: #F7931A;
            font-size: 20px;
        }
        .wrap-img-News {
            position: relative;
            width: 150px;
            margin: 0 auto;
        }
        .wrap-img-News .avatarNews {
            width: 150px;
            height: 150px;
            border: 2px solid #d2d6de;
            border-radius: 50%;
            object-fit: cover;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }
        btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .accout .btn {
            background-color: #F7931A;
            color: #fff;
        }
        .ck-editor__editable {
            height: 300px;
        }
    </style>
@endpush
@section('content')

    <div class="container">
        <div class="accout">
            <form id="w0" action="{{ route('customer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4 class="accout-title">Thông tin tài khoản</h4>
                <div class="accout-content">
                    <div id="uploaded" class="wrap-img-News">
                        <img class=" img-responsive  avatarNews" src="{{ $user->image ? url($user->image) : asset('assets/frontend/img/default-ava.png') }}" alt="">
                        <div class="form-group field-uploadAvatar mt-2">
                            <input type="hidden" name="avatar" value=""><input type="file" id="uploadAvatar" name="avatar" value="uploads/avatar/2022/05/06/default-avatar-1651810836.png">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <strong>*Chú ý: yêu cầu hình ảnh dưới 5MB</strong>
                    <div class="infouser">
                        <div class="form-group field-userweb-email">
                            <label class="control-label" for="userweb-email">Email</label>
                            <input type="text" id="userweb-email" class="form-control" name="UserWeb[email]" value="{{$user->email}}" disabled="disabled">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-full_name">
                            <label class="control-label" for="name">Họ và Tên</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-user_name">
                            <label class="control-label" for="username">Tên tài khoản</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{$user->username}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-id_card">
                            <label class="control-label" for="identify_no">Căn cước công dân</label>
                            <input type="text" id="identify_no" class="form-control" name="identify_no" value="{{$user->identify_no}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-phone">
                            <label class="control-label" for="phone">Số điện thoại</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{$user->phone}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group field-userweb-birthday">
                                    <label class="control-label" for="date_of_birth">Ngày sinh</label>
                                    <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}" maxlength="255">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group field-userweb-gender">
                                    <label class="control-label" for="gender">Giới tính</label>
                                    <select id="gender" class="form-control" name="gender">
                                        @php
                                            $category= App\Helpers\Template::gender($user->gender);
                                        @endphp
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group field-userweb-description">
                            <label class="control-label" for="about">Mô tả bản thân</label>
                            <textarea id="about" class="count-length form-control" name="about" maxlength="255" rows="3"> {{ $user->about }}</textarea>

                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn ">Lưu thông tin</button>
                </div>
            </form>
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

    </script>
@endpush