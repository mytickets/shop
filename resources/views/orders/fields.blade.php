<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Pay Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_type', 'Pay Type:') !!}
    {!! Form::number('pay_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Adr Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('adr', 'Adr:') !!}
    {!! Form::textarea('adr', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отмена</a>
</div>
