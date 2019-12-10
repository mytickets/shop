<!-- Id Field -->
{{-- <div class="form-group2"> --}}
    {{-- {!! Form::label('id', __('Id') ) !!}:  --}}
    {{-- {!! $order->id !!} --}}
{{-- </div> --}}

<!-- Created At Field -->
<div class="form-group2">
    {!! Form::label('created_at', __('Created At') ) !!}: 
    {!! $order->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group2">
    {!! Form::label('updated_at', __('Updated At') ) !!}: 
    {!! $order->updated_at !!}
</div>

<!-- Pay Type Field -->
<div class="form-group2">
    {!! Form::label('pay_type', __('Pay Type') ) !!}: 
    {{-- {!! $order->pay_type !!} --}}
    {!! $pay_types[$order->pay_type] ?? 'pay_type' !!}
</div>

<!-- Pay Place Field -->
<div class="form-group2">
    {!! Form::label('pay_place', __('Pay Place') ) !!}: 
    {{-- {!! $order->pay_place !!} --}}
    {!! $pay_places[$order->pay_place] !!}
</div>

<!-- Pay Adr Field -->
<div class="form-group2">
    {!! Form::label('pay_adr', __('Pay Adr') ) !!}: 
    {!! $order->pay_adr !!}
</div>

<!-- Pay Contact Field -->
<div class="form-group2">
    {!! Form::label('pay_contact', __('Pay Contact') ) !!}: 
    {!! $order->pay_contact !!}
</div>

<!-- Pay Discount Field -->
{{-- <div class="form-group2"> --}}
    {{-- {!! Form::label('pay_discount', __('Pay Discount') ) !!}:  --}}
    {{-- {!! $order->pay_discount !!} --}}
{{-- </div> --}}

<!-- Status Field -->
<div class="form-group2">
    {!! Form::label('status', __('Status') ) !!}: 
        {!! $status[$order->status] !!}
</div>

<div class="form-group2">
    {!! Form::label('user_id', 'Ответственный' ) !!}: 
        {!! $order->user_id !!}
</div>

<!-- Comment Field -->
<div class="form-group2">
    {!! Form::label('comment', __('Comment') ) !!}: 
    <pre>{!! $order->comment !!}</pre>
</div>

