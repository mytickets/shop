<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        <th>{{ __('Desc') }}</th>
        <th>{{ __('Ident') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Xml Name') }}</th>
        <th>{{ __('Xml Cat') }}</th>
        <th>{{ __('Cat Id') }}</th>
        <th>{{ __('Remote Images') }}</th>
        <th>{{ __('Price Amount') }}</th>
        <th>{{ __('Price') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{!! $product->name !!}</td>
            <td>{!! $product->desc !!}</td>
            <td>{!! $product->ident !!}</td>
            <td>{!! $product->image !!}</td>
            <td>{!! $product->xml_name !!}</td>
            <td>{!! $product->xml_cat !!}</td>
            <td>{!! $product->cat_id !!}</td>
            <td>{!! $product->remote_images !!}</td>
            <td>{!! $product->price_amount !!}</td>
            <td>{!! $product->price !!}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
