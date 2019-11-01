@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Создать:</b> Line Item
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'lineItems.store']) !!}

                        @include('line_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
