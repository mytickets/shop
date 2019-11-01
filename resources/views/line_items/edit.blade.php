@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Line Item
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lineItem, ['route' => ['lineItems.update', $lineItem->id], 'method' => 'patch']) !!}

                        @include('line_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection