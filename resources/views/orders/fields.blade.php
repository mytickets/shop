<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Pay Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pay_type', __('Pay Type')) !!}
    {!!  Form::select('pay_type', $pay_types, null, ['class' => 'form-control']) !!}
    {{-- {!! Form::text('pay_type', null, ['class' => 'form-control', 'disabled'=>'']) !!} --}}
</div>

<!-- Pay Place Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pay_place', __('Pay Place')) !!}
    {{-- {!! Form::text('pay_place', null, ['class' => 'form-control', 'disabled'=>'']) !!} --}}
    {!!  Form::select('pay_place', $pay_places, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', __('Status')) !!}
    {{-- {!! Form::text('status', null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('status', $status, null, ['class' => 'form-control']) !!}
</div>
<!-- Pay Adr Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('pay_adr', __('Pay Adr')) !!}
    {!! Form::textarea('pay_adr', null, ['class' => 'form-control', 'rows'=>'4']) !!}
</div>


<!-- Pay Discount Field -->
{{-- <div class="form-group col-sm-6"> --}}
    {{-- {!! Form::label('pay_discount', __('Pay Discount')) !!} --}}
    {{-- {!! Form::text('pay_discount', null, ['class' => 'form-control']) !!} --}}
{{-- </div> --}}



<!-- Pay Contact Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pay_contact', __('Pay Contact')) !!}
    {!! Form::text('pay_contact', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-sm-4">
    {!! Form::label('user_id', 'Ответственный') !!}
    {{-- {!!  Form::select('user_id', $users, null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('user_id', App\Models\User::all()->pluck('name', 'id')->prepend('Нет ответственного', '0'), null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('send_email', 'Уведомить ответственного') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('menu', 0) !!}
        {!! Form::checkbox('send_email', '1', null) !!}
        {{-- {!! Form::text('send_email', null, ['class' => 'form-control']) !!} --}}
    </label>
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', __('Comment')) !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows'=>'4']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>
