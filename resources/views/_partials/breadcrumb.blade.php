<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(isset($customBreadcrumb))
                {!! $customBreadcrumb !!}
            @else
                {!! $breadCrumbHtml !!}
            @endif
        </div>
    </div>
</div>