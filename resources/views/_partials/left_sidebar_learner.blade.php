<br /><br />
<aside style="top: 66px;" id="sidebar_left" class="nano nano-light affix">
    <div class="sidebar-left-content nano-content">
        <ul class="nav sidebar-menu">
            <li class="{{Request::path()=='learner'?'active':''}}">
                <a href="{{url('learner')}}">
                    <span class="sidebar-title">Profile</span>
                    <span class="sb-menu-icon fa fa-user"></span>
                </a>
            </li>
            <li class="{{Request::path()=='learner/messages'?'active':''}}">
                <a href="{{url('learner/messages')}}">
                    <span class="sidebar-title">Messages</span>
                    <span class="sb-menu-icon fa fa-envelope"></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Reviews</span>
                    <span class="sb-menu-icon fa fa-star-half-full "></span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="sidebar-title">Recommedations</span>
                    <span class="sb-menu-icon fa fa-heart"></span>
                </a>
            </li>
        </ul>
    </div>
</aside>