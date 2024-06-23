<div class="right col-lg-3">
    <div class="write-right">
        <h3 class="title">
            <img src="{{ asset('assets/frontend/img/ic-pencil.svg') }}" alt="Viết bài" title="Viết bài">Viết bài
        </h3>
        <div class="box write-post" data-login="1">
            Nhập nội dung...
            <a href="#">Đăng bài</a>
        </div>
    </div>
    <div class="ads__box adweb m-0" style="margin-bottom:40px !important">
        <div class="banner" banner-adpos="pc-home-right1"></div>
    </div>
    <div class="tieu-diem">
        <h2><img src="{{ asset('assets/frontend/img/ic-tieu-diem.png') }}" alt="Tiêu điểm" title="Tiêu điểm">Tiêu điểm</h2>
        <ul>
            <li class="new-style">
                <!-- <span>1</span> -->
                <!-- <a href="/doanh-nhan" class="cat">Doanh nhân</a> -->
                <p><a href="/doanh-nhan" class="cat-new">Doanh nhân</a></p>
                <h3 class="title-news">
                    <a href="/ong-chu-vinfast-pham-nhat-vuong-toi-khong-lo-ve-doanh-so-xe-dien%E2%80%9D-p22648.html" class="title text-3">
                        Ông chủ VinFast Phạm Nhật Vượng: "Tôi không lo về doanh số xe điện”                </a>
                </h3>
            </li>
            <li class="new-style">
                <!-- <span>2</span> -->
                <!-- <a href="/doanh-nghiep" class="cat">Doanh nghiệp</a> -->
                <p><a href="/doanh-nghiep" class="cat-new">Doanh nghiệp</a></p>
                <h3 class="title-news">
                    <a href="/tt-group-cua-bau-hien-ban-bat-thanh-745-trieu-co-phieu-shb-p22665.html" class="title text-3">
                        T&amp;T Group của "bầu" Hiển bán bất thành 74,5 triệu cổ phiếu SHB                </a>
                </h3>
            </li>
            <li class="new-style">
                <!-- <span>3</span> -->
                <!-- <a href="/chung-khoan" class="cat">Chứng khoán</a> -->
                <p><a href="/chung-khoan" class="cat-new">Chứng khoán</a></p>
                <h3 class="title-news">
                    <a href="/mot-co-phieu-ngan-hang-con-du-dia-upside-hon-25-p22653.html" class="title text-3">
                        Một cổ phiếu ngân hàng còn dư địa "upside" hơn 25%                </a>
                </h3>
            </li>
            <li class="new-style">
                <!-- <span>4</span> -->
                <!-- <a href="/ngan-hang" class="cat">Ngân hàng</a> -->
                <p><a href="/ngan-hang" class="cat-new">Ngân hàng</a></p>
                <h3 class="title-news">
                    <a href="/nam-a-bank-sap-tang-von-vuot-13700-ty-dong-p22664.html" class="title text-3">
                        Nam A Bank sắp tăng vốn vượt 13.700 tỷ đồng                </a>
                </h3>
            </li>
            <li class="new-style">
                <!-- <span>5</span> -->
                <!-- <a href="/kinh-te-vi-mo" class="cat">Kinh tế vĩ mô</a> -->
                <p><a href="/kinh-te-vi-mo" class="cat-new">Kinh tế vĩ mô</a></p>
                <h3 class="title-news">
                    <a href="/fed-phat-tin-hieu-cat-giam-lai-suat-1-lan-nam-nay-p22650.html" class="title text-3">
                        Fed phát tín hiệu cắt giảm lãi suất 1 lần năm nay                </a>
                </h3>
            </li>
        </ul>
    </div>
    <div class="ads__box adweb m-0" style="margin-bottom:40px !important; margin-top:30px !important">
        <div class="banner" banner-adpos="pc-home-right2"><a href=""><img src="https://dff.vn//uploads/ads/300x250_1.jpg?v=1713942983" width="300" height="250"></a></div>
    </div>
    <div class="top-acount">
        <h4 class="title-right">Top thành viên</h4>
        <ul>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u335">
                    DFF VN            </a>
                <p>@user335</p>
                <button>Theo dõi</button>
            </li>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u334">
                    Đỗ Gia            </a>
                <p>@user334</p>
                <button>Theo dõi</button>
            </li>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u332">
                    Kim Giao            </a>
                <p>@user332</p>
                <button>Theo dõi</button>
            </li>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u331">
                    Phương Liên            </a>
                <p>@user331</p>
                <button>Theo dõi</button>
            </li>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u329">
                    Hoàng Tùng            </a>
                <p>@user329</p>
                <button>Theo dõi</button>
            </li>
            <li>
                <img src="{{ asset('assets/frontend/img/default-ava.png') }}">
                <a href="
                     /user/user-u323">
                    Hồ Thị Mỹ Duyên            </a>
                <p>@user323</p>
                <button>Theo dõi</button>
            </li>
        </ul>
    </div>
    <h3>Giá vàng</h3>
    <div id="box-gold" class="d-flex align-items-center justify-content-center" data-url="{{ route('get.gold') }}">
        <img src="{{ asset('images/loading.gif') }}" alt="">
    </div>
    <table id="tigia" class="table table-bordered table-right">
        <tbody>
        <tr class="head">
            <td colspan="4">
                Thông tin chứng khoán
                <p>Cập nhật 2024-06-14 00:20</p>
            </td>
        </tr>
        <!-- <tr class="name">
           <td>Name</td>
           <td>Giá trị</td>
           <td>Thay đổi</td>
           </tr> -->
        <tr>
            <td>VN-INDEX</td>
            <td class="txt-green">1,301.51</td>
            <td class="txt-green">1.32</td>
            <td class="txt-green">0.10%</td>
        </tr>
        <tr>
            <td>HNX-INDEX</td>
            <td class="txt-green">248.36</td>
            <td class="txt-green">0.05</td>
            <td class="txt-green">0.02%</td>
        </tr>
        <tr>
            <td>UPCOM-INDEX</td>
            <td class="txt-red">99.02</td>
            <td class="txt-red">0.12</td>
            <td class="txt-red">-0.12%</td>
        </tr>
        <tr>
            <td>VN30-INDEX</td>
            <td class="txt-green">1,333.85</td>
            <td class="txt-green">2.04</td>
            <td class="txt-green">0.15%</td>
        </tr>
        <tr>
            <td>HNX30-INDEX</td>
            <td class="txt-green">555.98</td>
            <td class="txt-green">1.32</td>
            <td class="txt-green">0.24%</td>
        </tr>
        </tbody>
    </table>
    <table id="tigia" class="table table-bordered table-right">
        <tbody>
        <tr class="head">
            <td colspan="3">
                Tỉ giá ngoại tệ
                <p>Cập nhật 2024-06-12</p>
            </td>
        </tr>
        <tr class="name">
            <td>Name</td>
            <td>Giá trị</td>
            <td>Thay đổi</td>
        </tr>
        <tr>
            <td>USD/VND</td>
            <td class="up">25443</td>
            <td class="up">0%</td>
        </tr>
        <tr>
            <td>EUR/VND</td>
            <td class="up">27503</td>
            <td class="up">0.6441%</td>
        </tr>
        <tr>
            <td>CNY/VND</td>
            <td class="up">3514.3486</td>
            <td class="up">0.205%</td>
        </tr>
        <tr>
            <td>JPY/VND</td>
            <td class="up">163.2951</td>
            <td class="up">0.009166%</td>
        </tr>
        <tr>
            <td>EUR/USD</td>
            <td class="up">1.0809</td>
            <td class="up">0.6331%</td>
        </tr>
        <tr>
            <td>USD/JPY</td>
            <td class="down">156.72</td>
            <td class="down">-0.2609%</td>
        </tr>
        <tr>
            <td>USD/CNY</td>
            <td class="down">7.2405</td>
            <td class="down">-0.193%</td>
        </tr>
        </tbody>
    </table>
    <table id="tigia" class="table table-bordered table-right">
        <tbody>
        <tr class="head">
            <td colspan="3">
                Giá vàng hôm nay
                <p>Cập nhật 2022-05-28 04:58</p>
            </td>
        </tr>
        <tr class="name">
            <td>Loại</td>
            <td>Giá mua</td>
            <td>Giá bán</td>
        </tr>
        <tr>
            <td>DOJI HN</td>
            <td class="">68,500</td>
            <td class="">69,500</td>
        </tr>
        <tr>
            <td>DOJI SG</td>
            <td class="">68,500</td>
            <td class="">69,450</td>
        </tr>
        <tr>
            <td>Phú Qúy SJC</td>
            <td class="">68,650</td>
            <td class="">69,400</td>
        </tr>
        <tr>
            <td>SJC TP HCM</td>
            <td class="">68,500</td>
            <td class="">69,500</td>
        </tr>
        <tr>
            <td>SJC Đà Nẵng</td>
            <td class="">68,500</td>
            <td class="">69,520</td>
        </tr>
        <tr>
            <td>PNJ TP.HCM</td>
            <td class="">54,100</td>
            <td class="">55,200</td>
        </tr>
        <tr>
            <td>PNJ HN</td>
            <td class="">54,100</td>
            <td class="">55,200</td>
        </tr>
        </tbody>
    </table>
    <div class="ads__box adweb m-0" style="margin-bottom:30px !important">
        <div class="banner" banner-adpos="pc-home-right3"></div>
    </div>
    <h4 class="tilte-right">Tag nổi bật</h4>
    <div class="tags-right">
        @foreach($tags as $key => $tag)
        <a href="{{ '/tag/' . $key }}" class="tag"># {{ $tag }}</a>
        @endforeach
    </div>
    <div class="footer">
        <a href="/" class="logo"><img src="{{ asset('assets/frontend/img/kff-grey.png') }}" alt="logo xam" width="150px" height="auto"></a>
        <div class="text1">
            <p>Chịu trách nhiệm nội dung: <strong>Admin KFF</strong></p>
            <p>Địa chỉ: <strong>Phường Tiền Phong, Thành phố Thái Bình, Tỉnh Thái Bình, Việt Nam</strong></p>
            <p>Điện thoại: <strong>0912.950.220</strong></p>
            <p>Email: <strong>admin@kff.vn</strong></p>
        </div>
        <div class="text2">
            <p>Giấy phép MXH 125/GP-BTTTT cấp 11/03/2022.</p>
            <p><a href="/policy"> Điều khoản dịch vụ</a> | <a href="/policy"> Chính sách riêng tư</a> | <a href="/policy">Quảng
                    Cáo</a>
            </p>
            <p>©<b>2024 Tài Chính Số.</b></p>
        </div>
    </div>
</div>