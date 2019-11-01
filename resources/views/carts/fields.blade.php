<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('carts.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Session Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('session_id', 'Session Id:') !!}
    {!! Form::text('session_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('carts.index') !!}" class="btn btn-default">Отмена</a>
</div>
