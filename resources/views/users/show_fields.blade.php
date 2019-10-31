<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', {{ __('Id') }} ) !!}

    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', {{ __('Name') }} ) !!}

    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', {{ __('Email') }} ) !!}

    <p>{!! $user->email !!}</p>
</div>

