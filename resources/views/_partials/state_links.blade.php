<nav>
    <div class="left-1-menu nav-right-menu">
        <div id="MainMenu">
            <div class="list-group panel">
                @foreach($states as $state)
                    <a href="{{url('instructors/'.str_slug($state->name))}}" class="list-group-item-success active">
                        <ul class="top-10 start0 list-style top-menu"><li class="menu-link">{{$state->name}}</li></ul></a>
                    <div class="clearfix"></div>
                @endforeach
            </div>
         </div>
    </div>
</nav>