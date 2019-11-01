<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', {{ __('Id') }} ) !!}

    <p>{!! $post->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', {{ __('Created At') }} ) !!}

    <p>{!! $post->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', {{ __('Updated At') }} ) !!}

    <p>{!! $post->updated_at !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', {{ __('Title') }} ) !!}

    <p>{!! $post->title !!}</p>
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', {{ __('Text') }} ) !!}

    <p>{!! $post->text !!}</p>
</div>

