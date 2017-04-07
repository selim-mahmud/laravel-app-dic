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
            <li class="{{Request::path()=='learner/reviews'?'active':''}}">
                <a href="{{url('learner/reviews')}}">
                    <span class="sidebar-title">Reviews</span>
                    <span class="sb-menu-icon fa fa-star-half-full "></span>
                </a>
            </li>
        </ul>
    </div>
</aside>