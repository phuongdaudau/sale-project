@extends('layouts.backend.app')

@section('title','Thông tin người dùng')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
    <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{ url($user->image) }}" width="150" height="150" alt="AdminBSB - Profile Image">
                            </div>
                            <div class="content-area">
                                <h3>{{$user->username}}</h3>
                                <p>{{App\Helpers\Template::role($user->role_id)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            @if(Auth::user()->id == $user->id)
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true">Thông Tin Cá Nhân</a></li>
                                    <li role="presentation" class=""><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Thay Đổi Mật Khẩu</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_settings">
                                        <form action="{{ route('master.user.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Họ và Tên</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Surname" value="{{$user->name}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-sm-2 control-label">SĐT</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$user->phone}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="about" class="col-sm-2 control-label">Giới Thiệu</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="about" class="form-control" id="about" name="about" placeholder="about" value="{{$user->about}}" required="">
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
                                        <form method="POST" action="{{ route('master.password.update') }}" class="form-horizontal">
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
                            @else
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true">Thông Tin Cá Nhân</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Họ và Tên</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên" value="{{$user->name}}" disabled required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{$user->email}}" disabled required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">SĐT</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{$user->phone}} " disabled required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Giới Thiệu</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Giới thiệu" value="{{$user->about}}" disabled required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/backend/js/pages/examples/profile.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush