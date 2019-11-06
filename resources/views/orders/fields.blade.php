<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Pay Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_type', 'Pay Type:') !!}
    {!! Form::text('pay_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Place Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_place', 'Pay Place:') !!}
    {!! Form::text('pay_place', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Adr Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pay_adr', 'Pay Adr:') !!}
    {!! Form::textarea('pay_adr', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_contact', 'Pay Contact:') !!}
    {!! Form::text('pay_contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_discount', 'Pay Discount:') !!}
    {!! Form::text('pay_discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>
