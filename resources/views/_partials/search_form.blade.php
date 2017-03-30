<div class="reservation-dropdowns">
    <div class="col-sm-4 p-left0 p-right0 col-sm-offset-3">
        <div class="btn-group width100">
            {!! Form::open (['method'=>'GET', 'url'=> '/search-driving-schools']) !!}
            {!! Form::text('postcode', null, ['class'=>'dropdown-btn-list dropdown-btn1 dropdown-btn1-1 btn btn-lg dropdown-toggle', 'placeholder'=>'Enter your postcode']) !!}
            <span class="text-danger">{{$errors->first('postcode')}}</span>
        </div>
    </div>
    <div class="col-sm-2 p-left0 p-right0">
        <div class="btn-group width100">
            <button type="submit" class="find-btn">Search</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>