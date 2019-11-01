<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $order->updated_at !!}</p>
</div>

<!-- Pay Type Field -->
<div class="form-group">
    {!! Form::label('pay_type', __('Pay Type') ) !!}
    <p>{!! $order->pay_type !!}</p>
</div>

<!-- Adr Field -->
<div class="form-group">
    {!! Form::label('adr', __('Adr') ) !!}
    <p>{!! $order->adr !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', __('Total') ) !!}
    <p>{!! $order->total !!}</p>
</div>

