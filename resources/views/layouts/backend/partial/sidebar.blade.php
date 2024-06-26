<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ url(Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{route('master.user.show', Auth::user()->id)}}"><i class="material-icons">settings</i>Thông Tin Cá Nhân</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Đăng Xuất
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">CHỨC NĂNG CHÍNH </li>
            @if (Request::is('master*'))
{{--            <li class="{{ Request::is('master/dashboard') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('master.dashboard')}}">--}}
{{--                    <i class="material-icons">dashboard</i>--}}
{{--                    <span>Thống kê</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="{{ Request::is('master/user*') ? 'active' : '' }}">
                <a href="{{ route('master.user.index')}}">    
                    <i class="material-icons">account_circle</i>
                    <span>Người dùng</span>
                </a>
            </li>
            <li class="{{ Request::is('master/category*') ? 'active' : ''}}">
                <a href="{{ route('master.category.index')}}">
                    <i class="material-icons">apps</i>
                    <span>Danh Mục</span>
                </a>
            </li>
            <li class="{{ Request::is('master/product*') ? 'active' : ''}}">
                <a href="{{ route('master.product.index')}}">
                    <i class="material-icons">library_books</i>
                    <span>Bài viết</span>
                </a>
            </li>
            <li class="{{ Request::is('master/tag*') ? 'active' : ''}}">
                <a href="{{ route('master.tag.index')}}">
                    <i class="material-icons">label</i>
                    <span>Nhãn Dán</span>
                </a>
            </li>
            <li class="header">Hệ thống</li>
            <li class="">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i><span>Đăng Xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">settings</i>
                    <span>Cài Đặt</span>
                </a>
            </li>
            @endif
            @if (Request::is('staff*'))
            <li class="{{ Request::is('staff/dashboard') ? 'active' : ''}}">
                <a href="{{ route('staff.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/tag*') ? 'active' : ''}}">
                <a href="{{ route('staff.tag.index')}}">
                    <i class="material-icons">label</i>
                    <span>Nhãn Dán</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/category*') ? 'active' : ''}}">
                <a href="{{ route('staff.category.index')}}">
                    <i class="material-icons">apps</i>
                    <span>Danh Mục</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/product*') ? 'active' : ''}}">
                <a href="{{ route('staff.product.index')}}">
                    <i class="material-icons">library_books</i>
                    <span>Sản Phẩm</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/order*') ? 'active' : ''}}">
                <a href="{{ route('staff.order.index')}}">
                    <i class="material-icons">content_paste</i>
                    <span>Đơn Hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/warehouse') ? 'active' : ''}}">
                <a href="{{ route('staff.warehouse')}}">
                    <i class="material-icons">view_module</i>
                    <span>Kho hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('staff/ship') ? 'active' : ''}}">
                <a href="{{ route('staff.ship')}}">
                    <i class="material-icons">directions_car</i>
                    <span>Vận chuyển</span>
                </a>
            </li>
            
            <li class="header">System</li>
            <li class="">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i><span>Đăng Xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li class="{{ Request::is('staff/user*') ? 'active' : ''}}">
                <a href="{{ route('staff.user.index')}}">
                    <i class="material-icons">settings</i>
                    <span>Thông Tin Cá Nhân</span>
                </a>
            </li>
            @endif
            @if (Request::is('shipper*'))
            <li class="{{ Request::is('shipper/dashboard') ? 'active' : ''}}">
                <a href="{{ route('shipper.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">System</li>
            <li class="">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i><span>Đăng Xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li class="{{ Request::is('shipper/user*') ? 'active' : ''}}">
                <a href="{{ route('shipper.user.index')}}">
                    <i class="material-icons">settings</i>
                    <span>Thông Tin Cá Nhân</span>
                </a>
            </li>
            @endif
            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
           <a href="javascript:void(0);">KFF 2024</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
