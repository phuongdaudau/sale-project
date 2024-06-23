<div class="header">
    <!-- <div class="container"> -->
    <div class="open-menu-mb" data-click="1">
        <span class="line v1"></span>
        <span class="line v2"></span>
        <span class="line v3"></span>
    </div>
    <div class="list-menu" style="display: none;">
        <ul>
            <li>
                <form action="/tim-kiem">
                    <input type="text" name="key" value="" placeholder="Nhập gì đó để tìm..">
                    <button type="submit"><span class="material-icons">
               search
               </span></button>
                </form>
                <!-- <a href="#">Bài viết theo chủ đề</a> -->
            </li>
            @foreach($categories['parent'] as $parentKey => $parent)
                <li>
                    <a href="{{ '/'. $categories['slug'][$parentKey] }}" title="">{{ $parent }}</a>
                    @if(isset($categories['child'][$parentKey]))
                        <span class="material-icons showmenu" data-click="0">
                        expand_more
                        </span>
                        <ul>
                            @foreach($categories['child'][$parentKey] as $childKey => $child)
                                <li><a href="{{ '/'. $categories['slug'][$childKey] }}" title="">{{ $child }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            <li style="display:none"><a href="/video" title="">Video</a></li>
        </ul>
        <div class="bottom-sidebar">
            <div class="text">KFF<span>SOCIAL MEDIA</span></div>
            <div class="isocial">
                <a href="#">
                    <svg>
                        <use xlink:href="#Facebook"></use>
                    </svg>
                </a>
                <a href="#">
                    <svg>
                        <use xlink:href="#Instagram"></use>
                    </svg>
                </a>
                <a href="#">
                    <svg>
                        <use xlink:href="#Twitter"></use>
                    </svg>
                </a>
                <a href="#">
                    <svg>
                        <use xlink:href="#Linked"></use>
                    </svg>
                </a>
                <a href="#">
                    <svg>
                        <use xlink:href="#Youtube"></use>
                    </svg>
                </a>
            </div>
            <div class="ft">
                <a href="/policy">Điều khoản dịch vụ</a> |
                <a href="/policy">Chính sách bảo mật</a> |
                <a href="/policy">Thông tin quảng cáo</a>
            </div>
        </div>
    </div>
    <div class="logo">
       <a href="/" title="Logo"><img src="{{ asset('assets/frontend/img/kff-main.png') }}" alt="" width="100px" height="50px" /></a>
       <span>Diễn đàn kinh tế - tài chính</span>
       </div>
    <ul class="right-menu">
        <!-- <li>SUBSCRIBE</li> -->
        <li class="search">
            <span class="search-btn material-icons"> search </span>
            <form action="/tim-kiem">
                <input type="text" name="key" value="" placeholder="Nhập gì đó để tìm..">
            </form>
        </li>
        <li class="write-pc">
            <div class="write write-post" data-login="1">
                <span class="material-icons"> mode_edit </span>
                Viết
            </div>
        </li>
        <li class="write-mb">
            <div class="write write-post" data-login="1">
                <img src="{{ asset('assets/frontend/img/ic-pencil.svg') }}" alt="ic pencil" width="25px" height="29px">
            </div>
        </li>
        <li class="login-mb">
            <div class="acount box-login" data-toggle="modal" data-target="#loginModal">
                <span class="material-icons"> person </span>
            </div>
{{--            <div class="dropdown-info">--}}
{{--                <button class="box-login" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <div class="box-icon-wrapper">--}}
{{--                        <img src="{{ asset('assets/frontend/img/default-ava.png') }}" alt="avatar">--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">--}}
{{--                    <ul class="user_dropdown">--}}
{{--                        <li><strong>Xin chào, Phuong Do</strong></li>--}}
{{--                        <li>--}}
{{--                            <a href="/gui-bai">Viết bài</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/user/profile">Thông tin tài khoản</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/site/logout" data-method="post">Đăng xuất</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </li>
    </ul>
    <!-- </div> -->
</div>