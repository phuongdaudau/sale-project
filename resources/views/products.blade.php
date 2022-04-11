@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/frontend/img/bc.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Danh Sách Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <span>Sản Phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh Mục</h4>
                            <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('category.product', $category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="100" data-max="5000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Nhãn Dán</h4>
                            @foreach($tags as $tag)
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                {{$tag->name}}
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Sản Phẩm Mới</h4>
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
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Top Sales</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($best_sale_products as $product)
                                @php 
                                $category = $product->categories;
                                $image = App\Helpers\Template::getFirstPicture($product->image);
                                @endphp
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ Storage::disk('public')->url('product/'. $image) }}">
                                            <ul class="product__item__pic__hover">
                                                <li>
                                                    @guest
                                                        <a href="{{route('login')}}"><i class="fa fa-heart"></i></a>
                                                    @else
                                                        <a href="#" onclick="document.getElementById('favorite-form-{{ $product->id }}').submit();"><i class="fa fa-heart"></i></a>
                                                        <form id="favorite-form-{{ $product->id }}" method="POST" action="{{ route('customer.product.favorite',$product->id) }}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endguest
                                                    
                                                </li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$category[0]['name'] }}</span>
                                            <h5><a href="{{ route('product.details', $product->slug)}}">{{$product->name }}</a></h5>
                                            <div class="product__item__price">{{  number_format($product->price) }},000đ </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Bộ Lọc</span>
                                    <select>
                                        <option value="0">Mặc Định</option>
                                        <option value="0">Giá Cả</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$products->count()}}</span> Sản phẩm được tìm thấy</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            @php
                                $image = App\Helpers\Template::getFirstPicture($product->image);
                            @endphp
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ Storage::disk('public')->url('product/'. $image) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <a href="{{ route('product.details', $product->slug)}}">
                                    <h6>{{$product->name}}</h6>
                                    </a>
                                    <span>{{  number_format($product->price) }},000đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection

@push('js')
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
@endpush