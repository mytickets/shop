@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Metatext
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($metatext, ['route' => ['metatexts.update', $metatext->id], 'method' => 'patch']) !!}

                        @include('metatexts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection