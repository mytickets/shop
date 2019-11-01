@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Cart
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cart, ['route' => ['carts.update', $cart->id], 'method' => 'patch']) !!}

                        @include('carts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection