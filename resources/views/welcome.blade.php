@extends('layouts.frontend.app')

@section('title','Home')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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
                                <a href="{{ route('product.details', $product['slug'])}}" class="latest-product__item">
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