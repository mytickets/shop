<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $cat->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $cat->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $cat->updated_at !!}</p>
</div>

<!-- Ident Field -->
<div class="form-group">
    {!! Form::label('ident', __('Ident') ) !!}
    <p>{!! $cat->ident !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name') ) !!}
    <p>{!! $cat->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc') ) !!}
    <p>{!! $cat->desc !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('Image') ) !!}
    <p><img class="img-responsive" style="max-width:400px;" src="{!! $cat->image !!}"></p>
    <p>{!! $cat->image !!}</p>
</div>

<!-- Xml Name Field -->
<div class="form-group">
    {!! Form::label('xml_name', __('Xml Name') ) !!}
    <p>{!! $cat->xml_name !!}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', __('Parent Id') ) !!}
    <p>{!! $cat->parent_id !!}</p>
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', __('Menu') ) !!}
    <p>{!! $cat->menu !!}</p>
</div>

