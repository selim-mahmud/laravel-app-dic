<header>
    <div class="h-first-row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h1 style="font-size: 14px; font-weight: 600; margin:10px 0 0 0" class="text-uppercase hidden-xs">
                        Welcome to Driving Instructors Catalog</h1>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div style="width: 284px;" class="h-login">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                @if(Auth::check())
                                    <a href="{{url('logout')}}" class="btn btn-default dropdown-toggle"><i
                                                style="margin-right:5px; font-size: 15px;"
                                                class="fa fa-sign-out primary_color" aria-hidden="true"></i>Logout</a>
                                @else
                                    <a href="{{url('login')}}" class="btn btn-default dropdown-toggle"><i
                                                style="margin-right:5px; font-size: 15px;"
                                                class="fa fa-sign-in primary_color" aria-hidden="true"></i>Login</a>
                                @endif

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                    @if(Auth::check())
                                    &nbsp;&nbsp;&nbsp;<a href="
                                    @if(Auth::user()->can(config('dic.learner_permission_name1')))
                                        {{'/learner'}}
                                    @elseif(Auth::user()->can(config('dic.school_manager_permission_name2')))
                                        {{'/school'}}
                                    @elseif(Auth::user()->can(config('dic.staff_permission_name2')))
                                        {{'/staff'}}
                                    @endif
                                " class="btn btn-default dropdown-toggle"><i
                                style="margin-right:5px; font-size: 15px;"
                                class="fa fa-user primary_color" aria-hidden="true"></i>Dashboard</a>

                                    @else
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="register"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i style="margin-right:5px; font-size: 15px;"
                                                   class="fa fa-user primary_color" aria-hidden="true"></i>Register<i
                                                        class="fa fa-angle-down"></i>
                                            </button>
                                            <ul style="margin-left: -108px;" class="dropdown-menu top_dropdown_menu"
                                                aria-labelledby="register">
                                                <li><a href="{{url('register-as-school')}}"><span
                                                                class="glyphicon glyphicon-chevron-right primary_color"></span>
                                                        Register your School</a></li>
                                                <li><a href="{{url('register-as-learner')}}"><span
                                                                class="glyphicon glyphicon-chevron-right primary_color"></span>
                                                        Register as a Learner</a></li>
                                            </ul>
                                        </div>
                                    @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- end of row -->
        </div><!-- end of .container -->
    </div><!-- end of .h-first-row -->
    <!-- ========= end of top header ========== -->

    <!-- ========= start of bottom header ========== -->
    <div id="header" class="h-second-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-10 h-logo">
                    <div class="logotype">
                        <a href="/"><img src="{{asset('img/theme/dic_logo.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-2 h-menu">
                    <nav>

                        <div class="mobileMenuNav mobileMenuSwitcher onlyMobileMenu">
                            <i class="fa fa-bars"></i>
                        </div>

                        <div class="nav-container container-fluid padding0">
                            <div class="close-menu mobileMenuSwitcher onlyMobileMenu">
                                <i class="fa fa-times"></i>
                            </div>

                            <ul class="nav navbar-nav navbar-main navbar-right">
                                <li><a href="/">Home</a></li>
                                <li class="dropdown">
                                    <a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Driving Instructors <i
                                                class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="03-category-1.html">Instructors in Sydney</a></li>
                                        <li><a href="04-category-2.html">Instructors in Melbourne</a></li>
                                        <li><a href="05-category-3.html">Instructors in Brisbane</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">How it works <i
                                                class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/">For learners</a></li>
                                        <li><a href="/">For instructors</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Content Pages <i
                                                class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="03-category-1.html">Content Pages 1</a></li>
                                        <li><a href="04-category-2.html">Content Pages 2</a></li>
                                        <li><a href="05-category-3.html">Content Pages 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="/">Blog</a></li>
                                <li><a href="{{url('about-us')}}">About</a></li>
                                <li><a href="{{url('contact-us')}}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div><!-- end of .row -->
        </div><!-- end of .container -->
    </div><!-- end of .h-second-row -->
</header><!-- end of header -->