@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/frontend/img/bc.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên Hệ Với Hanpico</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">Trang Chủ</a>
                            <span>Liên Hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Hotline</h4>
                        <p>+84 922 353 113</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p>Số 5 - TT4 - KĐT Văn Phú - Phường Phú La - Quận Hà Đông - TP.Hà Nội</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ Mở Cửa</h4>
                        <p>8:00 am đến 20:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p> hanpico@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d854.042309901646!2d105.78141711100939!3d20.978242889018375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532d45792f35%3A0xaebe047565c2097e!2zQ8O0bmcgVHkgVG5oaCBUaGnhur90IELhu4sgVsOgIFbhuq10IFTGsCBOZ8OgbmggTsaw4bubYyBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1649299721739!5m2!1svi!2s" 
                width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Hà Nội</h4>
                <ul>
                    <li>SĐT: +84 922 353 113</li>
                    <li>Địa Chỉ: Quận Hà Đông - TP.Hà Nội</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

@endsection