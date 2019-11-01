<div class="table-responsive">
    <table class="table" id="cats-table">
        <thead>
            <tr>
                <th>{{ __('Ident') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Desc') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Xml Name') }}</th>
        <th>{{ __('Menu') }}</th>
        <th>{{ __('Menu Left') }}</th>
        <th>{{ __('Parent Id') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <td>{!! $cat->ident !!}</td>
            <td>{!! $cat->name !!}</td>
            <td>{!! $cat->desc !!}</td>
            <td>{!! $cat->image !!}</td>
            <td>{!! $cat->xml_name !!}</td>
            <td>{!! $cat->menu !!}</td>
            <td>{!! $cat->menu_left !!}</td>
            <td>{!! $cat->parent_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['cats.destroy', $cat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cats.show', [$cat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('cats.edit', [$cat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
