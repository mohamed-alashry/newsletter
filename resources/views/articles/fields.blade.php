<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
    @if (isset($article))
        <p><img src="{{ asset($article->image) }}" alt="" width="200"></p>
    @endif
</div>
<div class="clearfix"></div>

<!-- Shape Field -->
<div class="form-group col-sm-12">
    {!! Form::label('shape', 'Shape:') !!}
    <label class="radio-inline">
        {!! Form::radio('shape', 1, true) !!} Full
    </label>

    <label class="radio-inline">
        {!! Form::radio('shape', 2, null) !!} Half
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
