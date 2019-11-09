<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}: 
    <p>{!! $order->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}: 
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}: 
    <p>{!! $order->updated_at !!}</p>
</div>

<!-- Pay Type Field -->
<div class="form-group">
    {!! Form::label('pay_type', __('Pay Type') ) !!}: 
    {{-- <p>{!! $order->pay_type !!}</p> --}}
    {!! $pay_types[$order->pay_type] !!}
</div>

<!-- Pay Place Field -->
<div class="form-group">
    {!! Form::label('pay_place', __('Pay Place') ) !!}: 
    {{-- <p>{!! $order->pay_place !!}</p> --}}
    {!! $pay_places[$order->pay_place] !!}
</div>

<!-- Pay Adr Field -->
<div class="form-group">
    {!! Form::label('pay_adr', __('Pay Adr') ) !!}: 
    <p>{!! $order->pay_adr !!}</p>
</div>

<!-- Pay Contact Field -->
<div class="form-group">
    {!! Form::label('pay_contact', __('Pay Contact') ) !!}: 
    <p>{!! $order->pay_contact !!}</p>
</div>

<!-- Pay Discount Field -->
<div class="form-group">
    {!! Form::label('pay_discount', __('Pay Discount') ) !!}: 
    <p>{!! $order->pay_discount !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status') ) !!}: 
    <p>
        {{-- {!! $order->status !!} --}}
        {!! $status[$order->status] !!}
    </p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', __('Comment') ) !!}: 
    <p>{!! $order->comment !!}</p>
</div>

