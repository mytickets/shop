@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Line Item
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('line_items.show_fields')
                    <a href="{!! route('lineItems.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('lineItems.edit', [$lineItem->id]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
