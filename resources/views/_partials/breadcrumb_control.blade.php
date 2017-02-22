<div class="row">
    <div class="col-md-12">
        <header style="margin-top: 10px" id="topbar" class="alt">
            <div class="topbar-left">
                @if(isset($customBreadcrumb))
                    {!! $customBreadcrumb !!}
                @else
                    {!! $breadCrumbHtml !!}
                @endif
            </div>
        </header>
    </div>
</div>
