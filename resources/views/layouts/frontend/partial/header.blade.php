<header class="header">
<div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hanpico@gmail.com</li>
                                <li>Sự lựa chọn tốt nhất trong kiểm soát lượng nước</li>
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
                            <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{route('home')}}">TRANG CHỦ</a></li>
                            <li  class="{{ Request::is('product*') ? 'active' : ''}}"><a href="{{route('product.index')}}">SẢN PHẨM</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Tất Cả Sản Phẩm</a></li>
                                    <li><a href="./blog-details.html">Blog Hanpico</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">BÁO GIÁ</a></li>
                            <li  class="{{ Request::is('contact') ? 'active' : ''}}"><a href="{{route('contact')}}">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @guest
                            <li><a href="{{route('login')}}"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="{{route('login')}}"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                            @else
                            <li><a href="{{route('customer.favorite.show')}}"><i class="fa fa-heart"></i> <span>{{Auth::user()->favorite_products->where('pivot.user_id',Auth::id())->count()}}</span></a></li>
                            <li class="cart-icon"><a href="#">
                                <i class="fa fa-shopping-bag"></i> <span>0</span>
                                </a>
                            </li>
                            @endguest
            
                            
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
        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả</span>
                        </div>
                        <ul>
                            <li><a href="#">Van Bướm</a></li>
                            <li><a href="#">Van Gang</a></li>
                            <li><a href="#">Van Giảm Áp</a></li>
                            <li><a href="#">Đồng Hồ Đo Nước</a></li>
                            <li><a href="#">Khớp Nối Mềm</a></li>
                            <li><a href="#">Máy Bơm Nước</a></li>
                            <li><a href="#">Trụ Cứu Hỏa</a></li>
                            <li><a href="#">Mặt Bích</a></li>
                            <li><a href="#">Ống Thép</a></li>
                            <li><a href="#">Vật Tư PCCC</a></li>
                            <li><a href="#">Phụ kiện</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="GET" action="{{ route('search') }}">
                                <input value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Nhập tên sản phẩm bạn muốn tìm?">
                                <button type="submit" class="site-btn">TÌM KIẾM</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 922 353 113</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->