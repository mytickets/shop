<!-- Id Field -->
<div class="form-group  col-sm-3">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $user->id !!}</p>
</div>

<div class="form-group  col-sm-9">
    {!! Form::label('role', __('Role') ) !!}
    <p>{!! $role_types[$user->role_type] ?? 'Без прав' !!}</p>
</div>

 <td></td>

<!-- Name Field -->
<div class="form-group  col-sm-12">
    {!! Form::label('name', __('Name') ) !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group  col-sm-12" >
    {!! Form::label('email', __('Email') ) !!}

    <p>{!! $user->email !!}</p>
</div>



<div class="form-group col-sm-12">
    {!! Form::label('subscribe', 'Получать уведомление о новом заказе:') !!}
    @if ($user->subscribe==1)
        Да
    @else
        Нет
    @endif
    {{-- <p>{!! if ($user->subscribe==1) { "Да" } else { "Нет" !!}</p> --}}
{{--     <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('subscribe', 0) !!}
        {!! Form::checkbox('subscribe', '1', null) !!}
    </label>
 --}}
</div>


