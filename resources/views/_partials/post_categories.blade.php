<nav>
    <div class="nav-right-menu">
        <div class="right-title uppercase"><i class="fa fa-star"></i>categories</div>
        <ul class="start0">
            @foreach($categories as $category)
                <li class="menu-link"><a href="{{url('blog/categories', [str_slug($category->name)])}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
</nav>