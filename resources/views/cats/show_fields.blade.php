<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    {!! $cat->ident !!}
</div> --}}
<!-- Ident Field -->
<div class="form-group">
    {!! Form::label('ident', __('Ident').':' ) !!}
    {!! $cat->ident !!}
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', __('Menu').':' ) !!}
    {{-- {!! $cat->menu !!} --}}
    @if ($cat->menu)
        <span class="badge label label-success">Вкл</span>
    @else
      <span class="badge label label-default">Выкл</span>
    @endif
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':' ) !!}
    {!! $cat->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':' ) !!}
    {!! $cat->updated_at !!}
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name').':' ) !!}
    {!! $cat->name !!}
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':' ) !!}
    {!! $cat->desc !!}
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('Image').':' ) !!}
    <img class="img-responsive" src="{!! $cat->image !!}">
    {!! $cat->image !!}
</div>

<!-- Xml Name Field -->
<div class="form-group">
    {!! Form::label('xml_name', __('Xml Name').':' ) !!}
    {!! $cat->xml_name !!}
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', __('Parent Id').':' ) !!}
    {!! $cat->parent_id !!}
    
</div>


