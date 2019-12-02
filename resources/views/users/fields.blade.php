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
<div class="form-group col-sm-4">
    {!! Form::label('set_pass', 'Установить пароль:') !!}
    <label class="checkbox-inline form-control " style="    text-align: center;">
        {!! Form::hidden('set_pass', 0) !!}
        {!! Form::checkbox('set_pass', '1', null,['class'=> 'set_pass2']) !!}
    </label>
</div>
<div class="form-group col-sm-4 set_pass">
    {!! Form::label('password', 'Пароль:') !!}
        {{-- @if (isset($user->password)) --}}
    @if (isset($user->password))
        {{-- @if ( $user->password == '') --}}
        {{-- {!! Form::text('password', null, ['class' => 'form-control']) !!} --}}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    @else
        {{-- Пароль нельзя увидеть, только изменить --}}
        {{-- {!! Form::text('password', null, ['class' => 'form-control']) !!} --}}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    @endif 
    {{-- @endif --}}
</div>
<div class="form-group col-sm-4 set_pass">
    {!! Form::label('password_confirmation', 'Пароль подтверждение:') !!}
    {{-- , 'required' => 'required' --}}
    {{-- {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!} --}}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Отмена</a>
</div>


<script type="text/javascript">
    $('#set_pass').click(function(e){
        // $('.set_pass').show();
        // $('.set_pass').first().show();
        // $('.set_pass').last().show();
        // $(this)
    })
</script>