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
            <label for="services">Select one or more services:</label>
                <select name="services[]" class="service_multiple form-control" id="services" multiple="multiple">
                    @foreach($services as $service)
                        <option {{in_array($service->id, $instructorServiceIds)?'selected':''}} value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            <span class="text-danger">{{$errors->first('services')}}</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('short_desc', 'Short description of instructor:') !!}
            {!! Form::text('short_desc', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s short description'])!!}
            <span class="text-danger">{{$errors->first('short_desc')}}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('long_desc', 'Long description of instructor:') !!}
            {!! Form::textarea('long_desc', null, ['class' => 'form-control', 'placeholder' => 'Instructor\'s short description'])!!}
            <span class="text-danger">{{$errors->first('long_desc')}}</span>
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




