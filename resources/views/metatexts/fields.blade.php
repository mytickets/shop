<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('metatexts.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Code Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_name', 'Code Name:') !!}
    {!! Form::text('code_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('code_text', 'Code Text:') !!}
    {!! Form::textarea('code_text', null, ['class' => 'form-control']) !!}
        CKEDITOR
    {!! Form::checkbox('CKEDITOR', '1', null) !!}
</div>



<!-- Draft Field -->
<div class="form-group col-sm-6">
    {!! Form::label('draft', 'Draft:') !!}
    <label class="checkbox-inline">
    </label>
        {!! Form::hidden('draft', 0) !!}
        {!! Form::checkbox('draft', '1', null) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('metatexts.index') !!}" class="btn btn-default">Отмена</a>
</div>


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  var ch;

  $('input[name ="CKEDITOR"]').click(function(e){
    if (ch==true) {
        for(name in CKEDITOR.instances)
        {
            CKEDITOR.instances[name].destroy()
        }
        ch=false;
    } else {
        CKEDITOR.replace('code_text', options);
        ch=true;
    }

  })
</script>