<div class="row">
    <div class="col-md-12"><h3>{{$heading_text}}</h3></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name of instructor:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s name'])!!}
            <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email of instructor:') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s email'])!!}
            <span class="text-danger">{{$errors->first('email')}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('phone', 'Phone of instructor:') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s phone'])!!}
            <span class="text-danger">{{$errors->first('phone')}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('short_description', 'Short description of instructor:') !!}
            {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s short description'])!!}
            <span class="text-danger">{{$errors->first('short_description')}}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('long_description', 'Long description of instructor:') !!}
            {!! Form::textarea('long_description', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s short description'])!!}
            <span class="text-danger">{{$errors->first('long_description')}}</span>
        </div>
    </div>

    <div class="col-md-6 allcp-form">
        <label class="field prepend-icon file file-fw">
            <span class="button btn-info">Upload profile photo</span>
            <input class="gui-file" name="photo" id="photo" onchange="document.getElementById('uploader').value = this.value;" type="file">
            <input class="gui-input" id="uploader" placeholder="File Select" type="text">
            <span class="text-danger">{{$errors->first('photo')}}</span>
        </label>
    </div>

    <div class="col-md-12"> <br />
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
    </div>
</div>


