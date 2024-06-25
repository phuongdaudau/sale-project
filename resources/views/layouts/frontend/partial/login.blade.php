<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="apopup-close" data-dismiss="modal" aria-label="Close"></button>
            <!-- đăng nhập -->
            <section id="login" class="panel">
                <div class="panel__header">
                    <div class="panel__title"> Đăng nhập tài khoản</div>
                    <div class="panel__header-description"> Chào mừng bạn trở lại! Xin mời đăng nhập </div>
                </div>
                <div class="panel__body">
                    <form class="login-form pt-20"  method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Email hoặc số điện thoại..." id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Mật khẩu..." id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-login btn-sign-up">
                                <text id="btn-log">Đăng nhập</text>
                            </button>
                        </div>
                    </form>
                    <div class="content-divider text-muted"> <span>Hoặc</span> </div>
                    <div class="form-social">
                        <button type="button" id="text-login" class="btn-social" data-platform="facebook">
                            <img src="{{ asset('assets/frontend/img/fblog.png') }}" alt="facebook login">
                            Đăng nhập bằng Facebook
                        </button>
                        <button type="button" class="btn-social" data-platform="google">
                            <img src="{{ asset('assets/frontend/img/gglog.png') }}" alt="google login">
                            Đăng nhập bằng Google
                        </button>
                    </div>
                </div>
                <div class="panel__footer">
                    <div class="note"> Bạn chưa có tài khoản KFF<span class="note-redirect" href="#register"> Đăng ký </span> </div>
                </div>
            </section>
            <!-- dăng kí -->
            <section id="register" class="panel" style="display: none;">
                <div class="panel__header">
                    <div class="panel__title"> Đăng ký tài khoản</div>
                    <div class="panel__header-description">Tạo tài khoản để sử dụng đầy đủ tính năng và tham gia cộng đồng thành viên của WEB.VN</div>
                </div>
                <div class="panel__body">
                    <form class="login-form pt-20"  method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Họ và tên..." id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Tên tài khoản..." id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Email..." id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input placeholder="Mật khẩu..." id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-login btn-sign-up">
                                <text id="btn-log">Đăng ký</text>
                            </button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="panel__footer">
                    <div class="note"> Khi bấm tạo tài khoản bạn đã đồng ý <br>với <a href="/policy">quy định</a> của KFF.VN</div>
                    <div class="note"> Bạn đã có tài khoản? <span class="note-redirect" href="#login">Đăng nhập</span> </div>
                </div>
            </section>
            <!-- Quên mật khẩu -->
            <section id="forgot" class="panel" style="display: none;">
                <div class="panel__header">
                    <div class="panel__title"> Quên mật khẩu </div>
                    <div class="panel__header-description">Nhập địa chỉ email đã đăng ký để lấy lại mật khẩu!</div>
                </div>
                <div class="panel__body">
                    <form class="login-form pt-20">
                        <div class="form-group">
                            <input class="form-control fogotemail" type="text" name="email" placeholder="Email...">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="button" class="btn-login confirm">
                                <text>Xác nhận</text>
                            </button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="panel__footer">
                    <div class="note"> Quay lại trang đăng nhập <span class="note-redirect" href="#login">tại
                     đây</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
</div>
