<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_type', 'Роль:') !!}
    {{-- {!! Form::text('email', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('role_type', $role_types, null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-sm-6">


    {!! Form::label('subscribe', 'Уведомлять на почту:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('subscribe', 0) !!}
        {!! Form::checkbox('subscribe', '1', null) !!}
    </label>


</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Пароль:') !!}
    {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Пароль подтверждение:') !!}
    {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Отмена</a>
</div>
