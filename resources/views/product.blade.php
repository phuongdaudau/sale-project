@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/frontend/img/bc.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        @php 
                        $category = $product->categories;
                        @endphp
                        <h2>{{$product->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <a href="./index.html">{{$category[0]['name'] }}</a>
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        @php 
                            $imgs = explode(",", $product->image);
                            $images = array_slice($imgs,1,5);
                        @endphp
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ Storage::disk('public')->url('product/'. $imgs[1]) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($images as $image)
                            <img data-imgbigurl="{{Storage::disk('public')->url('product/'. $image)}}"
                                src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{  number_format($product->price) }},000đ</div>
                        <p></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="quantity-item-{{$product->id}}" type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a onclick="addCartFromDetail({{$product->id}})" href="javascript:" class="primary-btn">THÊM VÀO GIỎ HÀNG</a>
                        @guest
                            <a href="{{route('login')}}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        @else
                            @if(!Auth::user()->favorite_products->where('pivot.product_id',$product->id)->count() )
                            <a href="#" onclick="document.getElementById('favorite-form-{{ $product->id }}').submit();" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            @else
                            <a href="#" onclick="document.getElementById('favorite-form-{{ $product->id }}').submit();"><i class="fa fa-heart"></i></a>
                            @endif
                            <form id="favorite-form-{{ $product->id }}" method="POST" action="{{ route('customer.product.favorite',$product->id) }}" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                       
                        <ul>
                            <li><b>Tình Trạng</b> <span>Còn Hàng</span></li>
                            <li><b>Vận Chuyển</b> <span>3-5 ngày</span></li>
                            <li><b>Khối Lượng</b> <span>{{ $product->weight}} kg</span></li>
                            <li><b>Chia sẻ</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Thông số</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Nhận xét <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{!! $product->about!!}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($related_products as $item)
                    @if($item->id != $product->id)
                        @php 
                            $imgs = explode(",", $item->image);
                            $images = array_slice($imgs,1,5);
                        @endphp
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ Storage::disk('public')->url('product/'. $images[0]) }}">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            @guest
                                                <a href="{{route('login')}}"><i class="fa fa-heart"></i></a>
                                            @else
                                                <a href="#" onclick="document.getElementById('favorite-form-{{ $item->id }}').submit();"><i class="fa fa-heart"></i></a>
                                                <form id="favorite-form-{{ $item->id }}" method="POST" action="{{ route('customer.product.favorite',$item->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('product.details', $item->slug)}}">{{$item->name }}</a></h6>
                                    <h5>{{  number_format($item->price) }},000đ</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection