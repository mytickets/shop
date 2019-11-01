<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cats.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Ident Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ident', 'Ident:') !!}
    {!! Form::text('ident', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Desc:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Xml Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('xml_name', 'Xml Name:') !!}
    {!! Form::text('xml_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::text('parent_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menu', 'Menu:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('menu', 0) !!}
        {!! Form::checkbox('menu', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cats.index') !!}" class="btn btn-default">Отмена</a>
</div>
