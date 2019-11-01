<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}

    <p>{!! $permission->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}

    <p>{!! $permission->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}

    <p>{!! $permission->updated_at !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name') ) !!}

    <p>{!! $permission->name !!}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', __('Guard Name') ) !!}

    <p>{!! $permission->guard_name !!}</p>
</div>

