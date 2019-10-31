<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', {{ __('Id') }} ) !!}

    <p>{!! $menu->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', {{ __('Created At') }} ) !!}

    <p>{!! $menu->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', {{ __('Updated At') }} ) !!}

    <p>{!! $menu->updated_at !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', {{ __('Name') }} ) !!}

    <p>{!! $menu->name !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', {{ __('Code') }} ) !!}

    <p>{!! $menu->code !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', {{ __('Url') }} ) !!}

    <p>{!! $menu->url !!}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', {{ __('Parent Id') }} ) !!}

    <p>{!! $menu->parent_id !!}</p>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', {{ __('Position') }} ) !!}

    <p>{!! $menu->position !!}</p>
</div>

