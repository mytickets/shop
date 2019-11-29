<!-- Id Field -->
<div class="form-group  col-sm-12">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $user->id !!}</p>
</div>

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
    {!! Form::label('subscribe', 'Уведомлять на почту:') !!}
    <p>{!! $user->subscribe !!}</p>
{{--     <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('subscribe', 0) !!}
        {!! Form::checkbox('subscribe', '1', null) !!}
    </label>
 --}}
</div>


