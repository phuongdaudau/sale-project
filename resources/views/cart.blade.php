@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/frontend/img/bc.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Lưu</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has('Cart') !=null)
                                @foreach(Session::get('Cart')->products as $item)
                                @php 
                                    $image = App\Helpers\Template::getFirstPicture($item['productInfo']->image);
                                @endphp
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 150px;" src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                                            <h5><a href="{{ route('product.details', $item['productInfo']->slug)}}">{{$item['productInfo']->name }}</a></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                        {{ number_format($item['productInfo']->price) }},000đ
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input id="quantity-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quantity']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                        {{ number_format($item['price']) }},000đ
                                        </td>
                                        <td class="shoping__cart__total">
                                            <span class="icon_check" onclick="saveQtyItemCart({{$item['productInfo']->id}})" ></span>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <span class="icon_close" onclick="deleteListItemCart({{$item['productInfo']->id}})"></span>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">TIẾP TỤC MUA HÀNG</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        CẬP NHẬT GIỎ HÀNG</a>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        @if(Session::has('Cart') !=null)
                        <h5>Tổng Giỏ Hàng</h5>
                        <ul>
                            <li>Tổng sản phẩm<span>{{Session::get('Cart')->totalQuantity}}</span></li>
                            <li>Tổng thanh toán <span>{{number_format(Session::get('Cart')->totalPrice)}},000đ</span></li>
                        </ul>
                        <a href="#" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection