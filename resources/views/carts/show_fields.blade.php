<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $cart->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $cart->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $cart->updated_at !!}</p>
</div>

<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', __('Session Id') ) !!}
    <p>{!! $cart->session_id !!}</p>
</div>

