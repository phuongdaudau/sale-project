<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KFF - Đăng nhập CMS </title>
    <link rel="icon" href="{{ asset('assets/frontend/favicon.png') }}" sizes="16x16" type="image/png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/frontend/css/auth/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/responsive.css') }}" rel="stylesheet">
    <style>
        .login-bg {
            background-color: #fff;
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: cover;
            -moz-background-size: cover;
            -ms-background-size: cover;
            -webkit-background-size: cover;
            overflow: hidden;
        }
        .faded-bg {
            background: rgba(50, 50, 50, .5);
            background: linear-gradient(180deg, rgba(21, 21, 28, 0) 0, rgba(21, 21, 28, .1) 40%, rgba(21, 21, 28, .3) 55%, rgba(21, 21, 28, .61) 75%, #15151c);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        .login-sidebar {
            background: #fff;
            border-radius: 0;
            justify-content: center;
            min-height: 100vh;
            padding: 0;
            position: relative;
            z-index: 2;
        }
        .login-container {
            margin-top: -150px;
            padding: 30px;
            position: absolute;
            top: 50%;
            width: 100%;
            z-index: 10;
        }
        .login-button {
            background: #02192d;
            border: 0;
            border-radius: 2px;
            color: #eee !important;
            display: block;
            float: left;
            font-size: 11px;
            font-weight: 400;
            opacity: .8;
            outline: 0 !important;
            padding: 12px 20px;
            text-align: center;
            text-transform: uppercase;
            transition: width .3s ease;
            width: auto;
        }
        .logo-title-container {
            bottom: 0;
            left: 0;
            position: fixed;
            width: 100%;
        }
        .copy {
            padding: 30px 30px 12px;
            width: auto;
            color: white;
        }
    </style>
<body class="login-bg" style=" background-image: url({{asset('assets/backend/images/bia.png')}}); ">

    <div class="container-fluid">
        <div class="row">
            <div class="faded-bg animated"></div>
            <div class="hidden-xs col-sm-7 col-md-8">
                <div class="clearfix">
                    <div class="col-sm-12 col-md-10 col-md-offset-2">
                        <div class="logo-title-container">
                            <div class="copy animated fadeIn">
                                <h1>KFF</h1>
                                <p>Copyright 2024 © KFF. Version: <span>1.00</span></p>
                            </div>
                        </div> <!-- .logo-title-container -->
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

                <div class="login-container">

                    <p>Đăng nhập dưới đây:</p>

                    <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" class="login-form" novalidate="novalidate">
                        @csrf
                        <div class="form-group" id="emailGroup">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group" id="passwordGroup">
                            <label>Mật khẩu</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div>
                            <label>
                                <input class="hrv-checkbox" checked="checked" name="remember" type="checkbox" value="1"> Nhớ mật khẩu
                            </label>
                        </div>

                        <button type="submit" class="btn btn-block login-button">
                            <span class="signin">Đăng nhập</span>
                        </button>
                        <div class="clearfix"></div>

                        <br>
                        <p><a class="lost-pass-link" href="{{ route('password.request') }}" title="Forgot Password">Quên mật khẩu</a></p>

                    </form>

                    <div class="clearfix"></div>

                </div> <!-- .login-container -->

            </div> <!-- .login-sidebar -->
        </div> <!-- .row -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/myjs.js') }}"></script>
    <script src="{{ asset('assets/frontend/libs/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js') }}"></script>

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
</body>
</html>