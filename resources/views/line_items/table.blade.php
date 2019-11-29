<div class="table-responsive">
    <table class="table" id="lineItems-table">
        <thead>
            <tr>
                <th>{{ __('Qty') }}</th>
        <th>{{ __('Cart Id') }}</th>
        <th>{{ __('Product Id') }}</th>
        <th>{{ __('Order Id') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lineItems as $lineItem)
            <tr>
                <td>{!! $lineItem->qty !!}</td>
            <td>{!! $lineItem->cart_id !!}</td>
            <td>{!! $lineItem->product_id !!}</td>
            <td>{!! $lineItem->order_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['lineItems.destroy', $lineItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('lineItems.show', [$lineItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('lineItems.edit', [$lineItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!} --}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
