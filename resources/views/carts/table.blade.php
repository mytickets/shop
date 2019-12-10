@section('css')

@endsection

{{-- {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!} --}}


<div class="table-responsive">
    <table class="table table-striped table-bordered responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Сессия</th>
                <th>Продукты</th>
                <th>Создано</th>
                <th>Обновлено</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{!! $cart->id !!}</td>

                <td>
                    <a href="{!! route('carts.show', [$cart->id]) !!}" >
                        {!! $cart->session_id !!}
                    </a>
                </td>

                <td>{!! count($cart->line_items) !!}</td>
                <td>{!! $cart->created_at !!}</td>
                <td>{!! $cart->updated_at !!}</td>



                <td>
                    {!! Form::open(['route' => ['carts.destroy', $cart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('carts.show', [$cart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('carts.edit', [$cart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@section('scripts')

@endsection
