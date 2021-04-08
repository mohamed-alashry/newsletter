<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $articleContent->id }}</p>
</div>

<!-- Article Id Field -->
<div class="form-group">
    {!! Form::label('article_id', 'Article Id:') !!}
    <p>{{ $articleContent->article_id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $articleContent->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{!! $articleContent->body !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{ asset($articleContent->image) }}" alt=""></p>
</div>

<!-- Sort Field -->
<div class="form-group">
    {!! Form::label('sort', 'Sort:') !!}
    <p>{{ $articleContent->sort }}</p>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    <p>{{ $articleContent->link }}</p>
</div>

<!-- Shape Field -->
<div class="form-group">
    {!! Form::label('shape', 'Shape:') !!}
    <p>{!! $articleContent->shape == 2 ? 'Half' : 'Full' !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $articleContent->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $articleContent->updated_at }}</p>
</div>
