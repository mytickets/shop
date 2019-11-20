<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $metatext->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $metatext->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $metatext->updated_at !!}</p>
</div>

<!-- Code Name Field -->
<div class="form-group">
    {!! Form::label('code_name', __('Code Name') ) !!}
    <p>{!! $metatext->code_name !!}</p>
</div>

<!-- Code Text Field -->
<div class="form-group">
    {!! Form::label('code_text', __('Code Text') ) !!}
    {!! $metatext->code_text !!}
</div>

<!-- Draft Field -->
<div class="form-group">
    {!! Form::label('draft', __('Draft') ) !!}
    <p>{!! $metatext->draft !!}</p>
</div>

