<div class="menu">
    <ul class="list">
        <li class="header">DANH MỤC</li>
        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
            <a href="{{asset('/home')}}">
                <i class="material-icons">home</i>
                <span>Trang chủ</span>
            </a>
        </li>
        <li class="">
            <a href="list-order.html">
                <i class="material-icons">layers</i>
                <span>Danh sách đơn hàng</span>
            </a>
        </li>

        <li class="{{Request::segment(1) === 'category' ? 'active' : null}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">business_center</i>
                <span>Category</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="create.html">
                        <i class="material-icons">playlist_add</i>
                        <span class="icon-name">Thêm category</span>

                    </a>
                </li>
                <li class="{{Request::segment(1) === 'category' ? 'active' : null}}">
                    <a href="{{asset('category')}}">
                        <i class="material-icons">view_list</i>
                        <span class="icon-name">Tất cả category</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">people</i>
                <span>Khách hàng</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="create.html">
                        <i class="material-icons">playlist_add</i>
                        <span class="icon-name">Thêm khách hàng</span>

                    </a>
                </li>
                <li>
                    <a href="list-order.html">
                        <i class="material-icons">view_list</i>
                        <span class="icon-name">Tất cả khách hàng</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="header">TÙY CHỈNH</li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">settings_applications</i>
                <span>Cài đặt</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="system-language.html">
                        <i class="material-icons">language</i>
                        <span class="icon-name">Ngôn ngữ</span>
                    </a>
                </li>
                <li>
                    <a href="menu.html">
                        <i class="material-icons">menu</i>
                        <span class="icon-name">Menu</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a data-method="post" href="{{asset('logout')}}">
                <i class="material-icons">input</i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</div>