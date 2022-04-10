<header class="header">
<div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hanpico@gmail.com</li>
                                <li>Sự lựa chọn tốt nhất của bạn trong kiểm soát lượng nước</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/vn.png" alt="">
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tiếng Việt</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if(Auth::check())
                                    @if(Auth::user()->role_id == 3)
                                    <a href="{{route('login')}}"><i class="fa fa-user"></i>Tài Khoản</a>
                                    @else
                                    <a href="{{route('login')}}"><i class="fa fa-user"></i>Quản Lý</a>
                                    @endif
                                @else
                                <a href="{{route('login')}}"><i class="fa fa-user"></i>Đăng Nhập</a>
                                @endif
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{ asset('assets/frontend/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">TRANG CHỦ</a></li>
                            <li><a href="{{route('product.index')}}">SẢN PHẨM</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Tất Cả Sản Phẩm</a></li>
                                    <li><a href="./blog-details.html">Blog Hanpico</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">BÁO GIÁ</a></li>
                            <li><a href="{{route('contact')}}">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng: <span>1.5000.000</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>