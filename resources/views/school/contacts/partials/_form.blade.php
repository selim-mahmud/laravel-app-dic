<div class="row">
    <div class="col-md-12"><h3>{{$heading_text}}</h3></div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('address', 'Enter full address:') !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Full address'])!!}
            <span class="text-danger">{{$errors->first('address')}}</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Enter email address:') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email address'])!!}
            <span class="text-danger">{{$errors->first('email')}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('phone', 'Enter phone number:') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone number'])!!}
            <span class="text-danger">{{$errors->first('phone')}}</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12"> <br />
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
    </div>
</div>




