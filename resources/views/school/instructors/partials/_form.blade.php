
<div class="form-group">
    {!! Form::label('title', 'Name of Subject:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Your Subject'])!!}
    <span class="text-danger">{{$errors->first('name')}}</span>
</div>

{!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}