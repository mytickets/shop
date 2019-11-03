{!! Form::open(['route' => ['cats.destroy', $ident], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('cats.show', $ident) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('cats.edit', $ident) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Вы уверены?')"
    ]) !!}
</div>
{!! Form::close() !!}
