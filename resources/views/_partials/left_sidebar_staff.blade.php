<br /><br />
<aside style="top: 66px;" id="sidebar_left" class="nano nano-light affix">
    <div class="sidebar-left-content nano-content">
        <ul class="nav sidebar-menu">
            <li class="{{Request::path()=='staff'?'active':''}}">
                <a href="{{url('staff')}}">
                    <span class="sidebar-title">Profile</span>
                    <span class="sb-menu-icon fa fa-user"></span>
                </a>
            </li>
            <li class="{{strpos(Request::path(), 'staff/users') !== false?'active':''}}">
                <a href="{{url('staff/users')}}">
                    <span class="sidebar-title">Users</span>
                    <span class="sb-menu-icon fa fa-users"></span>
                </a>
            </li>
            <li class="{{strpos(Request::path(), 'staff/schools') !== false?'active':''}}">
                <a href="{{url('staff/schools')}}">
                    <span class="sidebar-title">Schools</span>
                    <span class="sb-menu-icon fa fa-graduation-cap"></span>
                </a>
            </li>
            <li class="{{strpos(Request::path(), 'staff/reviews') !== false?'active':''}}">
                <a href="{{url('staff/reviews')}}">
                    <span class="sidebar-title">Reviews</span>
                    <span class="sb-menu-icon fa fa-star-half-full "></span>
                </a>
            </li>
        </ul>
    </div>
</aside>