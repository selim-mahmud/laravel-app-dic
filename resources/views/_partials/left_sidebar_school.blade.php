<br /><br />
<aside style="top: 66px;" id="sidebar_left" class="nano nano-light affix">
    <div class="sidebar-left-content nano-content">
        <ul class="nav sidebar-menu">
            <li class="{{Request::path()=='school'?'active':''}}">
                <a href="{{url('school')}}">
                    <span class="sidebar-title">Profile</span>
                    <span class="sb-menu-icon fa fa-id-card-o"></span>
                </a>
            </li>
            <li class="{{Request::path()=='school/contacts'?'active':''}}">
                <a href="{{url('school/contacts')}}">
                    <span class="sidebar-title">Contacts</span>
                    <span class="sb-menu-icon fa fa-location-arrow"></span>
                </a>
            </li>
            <li class="{{Request::path()=='school/services'?'active':''}}">
                <a href="{{url('school/services')}}">
                    <span class="sidebar-title">Services</span>
                    <span class="sb-menu-icon fa fa-diamond"></span>
                </a>
            </li>
            <li class="{{strpos(Request::path(), 'school/service-area') !== false?'active':''}}">
                <a href="{{url('school/service-area')}}">
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
            <li class="{{Request::path()=='school/medias'?'active':''}}">
                <a href="{{url('school/medias')}}">
                    <span class="sidebar-title">Media upload</span>
                    <span class="sb-menu-icon fa fa-camera"></span>
                </a>
            </li>
            <li class="{{Request::path()=='school/reviews'?'active':''}}">
                <a href="{{url('school/reviews')}}">
                    <span class="sidebar-title">Reviews</span>
                    <span class="sb-menu-icon fa fa-star-half-full"></span>
                </a>
            </li>
        </ul>
    </div>
</aside>