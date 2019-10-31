<div class="table-responsive">
    <table class="table" id="menus-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        <th>{{ __('Code') }}</th>
        <th>{{ __('Url') }}</th>
        <th>{{ __('Parent Id') }}</th>
        <th>{{ __('Position') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{!! $menu->name !!}</td>
            <td>{!! $menu->code !!}</td>
            <td>{!! $menu->url !!}</td>
            <td>{!! $menu->parent_id !!}</td>
            <td>{!! $menu->position !!}</td>
                <td>
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('menus.show', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('menus.edit', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
