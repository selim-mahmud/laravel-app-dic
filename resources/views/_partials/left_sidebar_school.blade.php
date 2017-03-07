<br /><br />
<aside style="top: 66px;" id="sidebar_left" class="nano nano-light affix">
    <div class="sidebar-left-content nano-content">
        <ul class="nav sidebar-menu">
            <li class="{{Request::path()=='school'?'active':''}}">
                <a href="{{url('school')}}">
                    <span class="sidebar-title">Dashboard</span>
                    <span class="sb-menu-icon fa fa-tachometer"></span>
                </a>
            </li>
            <li class="{{Request::path()=='school/profile'?'active':''}}">
                <a href="{{url('school/profile')}}">
                    <span class="sidebar-title">Profile</span>
                    <span class="sb-menu-icon fa fa-id-card-o"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Service area</span>
                    <span class="sb-menu-icon fa fa-map-marker"></span>
                </a>
            </li>
            <li class="{{strpos(Request::path(), 'school/instructors') !== false?'active':''}}">
                <a href="{{url('school/instructors')}}">
                    <span class="sidebar-title">Instructors</span>
                    <span class="sb-menu-icon fa fa-users"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Media upload</span>
                    <span class="sb-menu-icon fa fa-camera"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Messages</span>
                    <span class="sb-menu-icon fa fa-envelope"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Reviews</span>
                    <span class="sb-menu-icon fa fa-star-half-full"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Recommedationed by</span>
                    <span class="sb-menu-icon fa fa-heart"></span>
                </a>
            </li>
        </ul>
    </div>
</aside>