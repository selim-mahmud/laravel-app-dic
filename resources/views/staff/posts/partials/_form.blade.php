<div class="row">
    <div class="col-md-12"><h3>{{$heading_text}}</h3></div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('title', 'Title of the post:') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title of the post'])!!}
            <span class="text-danger">{{$errors->first('title')}}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('excerpt', 'Post excerpt:') !!}
            {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'placeholder' => 'Post excerpt'])!!}
            <span class="text-danger">{{$errors->first('excerpt')}}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('body', 'Post body:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Post body'])!!}
            <span class="text-danger">{{$errors->first('body')}}</span>
        </div>
    </div> <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="category">Select a category:</label>
                <select name="category" class="form-control" id="category">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option {{$category->id == $postCategoryId?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            <span class="text-danger">{{$errors->first('category')}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="published">Post publish?</label>
            <select name="published" class="form-control" id="published">
                <option value="">Select status</option>
                <option {{$published == 'Yes'?'selected':''}} value="Yes">Yes</option>
                <option {{$published == 'No'?'selected':''}} value="No">No</option>
            </select>
            <span class="text-danger">{{$errors->first('published')}}</span>
        </div>
    </div><div class="clearfix"></div><br />
    <div class="col-md-6 allcp-form">
        <label class="field prepend-icon file file-fw">
            <span class="button btn-info">Upload feature image</span>
            <input class="gui-file" name="photo" id="photo" onchange="document.getElementById('uploader').value = this.value;" type="file">
            <input class="gui-input" id="uploader" placeholder="File Select" type="text">
            <span class="text-danger">{{$errors->first('photo')}}</span>
        </label>
    </div>

    <div class="col-md-12"> <br />
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
    </div>
</div>




