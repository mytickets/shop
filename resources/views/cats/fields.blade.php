<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cats.index') !!}" class="btn btn-default">Отмена</a>
</div>


<!-- Menu Field -->
<div class="form-group col-sm-3">
    {!! Form::label('menu', 'В меню:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('menu', 0) !!}
        {!! Form::checkbox('menu', '1', null) !!}
    </label>
</div>

<!-- Ident Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ident', 'ID:') !!}
    {!! Form::text('ident', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Фото:') !!}
    <p><img class="img-responsive" src="{!! $cat->image !!}"></p>
    {!! $cat->image !!}
    {!! Form::file('image') !!}
</div>
{{-- <div class="clearfix"></div> --}}

<!-- Xml Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('xml_name', 'Xml Имя:') !!}
    {!! Form::text('xml_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Родитель:') !!}
    {{-- {!! Form::text('parent_id', null, ['class' => 'form-control']) !!} --}}
    {{-- {!! Form::text('parent_id', null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('parent_id', App\Models\Cat::all()->pluck('name', 'ident'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('position', 'Порядок в списке:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>


<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Описание:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cats.index') !!}" class="btn btn-default">Отмена</a>
</div>
