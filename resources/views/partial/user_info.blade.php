<div class="user-info">
    <div class="image">
        <img src="images/user.png" width="48" height="48" alt="User"/>
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
        <div class="email">{{Auth::user()->email}}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{asset('profile')}}"><i class="material-icons">person</i>Thông tin</a></li>
                <li role="seperator" class="divider"></li>
                <li role="seperator" class="divider"></li>
                <li><a href="{{asset('logout')}}"><i class="material-icons">input</i>Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</div>