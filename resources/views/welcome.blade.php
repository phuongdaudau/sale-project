@extends('layouts.frontend.app')

@section('title','Home')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
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
                            <form action="#">
                                <input type="text" placeholder="Bạn muốn tìm sản phẩm nào thế?">
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
                    <div class="hero__item set-bg" data-setbg="{{ asset('assets/frontend/img/hero/banner.png') }}">
                        <div class="hero__text">
                            <span>HANPICO</span>
                            <h2>Sản phẩm <br />100% Chính hãng</h2>
                            <p>Vật tư và thiết bị ngành nước uy tín tại Hà Nội </p>
                            <a href="#" class="primary-btn">MUA HÀNG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($categories as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ Storage::disk('public')->url('category/'. $category->image) }}">
                            <h5><a href="{{route('category.product', $category->slug)}}">{{$category->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

        <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Đặc Trưng</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            @foreach($tags as $tag)
                            <li data-filter="{{$tag->slug}}"><a href="{{route('tag.product', $tag->slug)}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-5.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-6.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-7.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-8.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('assets/frontend/img/1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('assets/frontend/img/2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End --> 

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Mới Nhất</h4>
                        @php
                            $first_part = array_slice($latest_products,0,3);
                            $last_part = array_slice($latest_products,3,3);
                        @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($first_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($last_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Đánh Giá Cao </h4>
                        @php
                            $first_part = array_slice($latest_products,0,3);
                            $last_part = array_slice($latest_products,3,3);
                        @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($first_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($last_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Đề Xuất</h4>
                        @php
                            $first_part = array_slice($latest_products,0,3);
                            $last_part = array_slice($latest_products,3,3);
                        @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($first_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($last_part as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product['image']);
                            @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{  number_format($product['price']) }},000đ</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

@endsection