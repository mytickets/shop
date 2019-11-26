<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Ident Field -->
<div class="form-group col-sm-2">
    {!! Form::label('ident', 'Ident:') !!}
    {!! Form::text('ident', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Field -->
<div class="form-group col-sm-2">
    {!! Form::label('menu', 'В меню:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('menu', 0) !!}
        {!! Form::checkbox('menu', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('position', 'Порядок в списке:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>



<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Фото:') !!}
    <img class="img-responsive" src="{{ $product->image ?? 'http://placehold.it/100x70' }}">
    {{ $product->image ?? "http://placehold.it/100x70" }}
    {!! Form::file('image') !!}
</div>
{{-- <div class="clearfix"></div> --}}

<!-- Xml Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('xml_name', 'Xml Имя:') !!}
    {!! Form::text('xml_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Xml Cat Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('xml_cat', 'Xml Категория:') !!}
    {!! Form::text('xml_cat', null, ['class' => 'form-control']) !!}
</div>
 --}}
<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Категория:') !!}
    {{-- {!! Form::text('cat_id', null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('cat_id', App\Models\Cat::all()->pluck('name', 'ident'), null, ['class' => 'form-control']) !!}
</div>

<!-- Price Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_amount', 'Цена:') !!}
    {!! Form::text('price_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Описание:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Отмена</a>
</div>
