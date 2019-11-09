@extends('layouts.app')


@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Древо
        {{-- <small id="list1">список</small> --}}
        {{-- <small id="table1">таблицa</small> --}}
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li> --}}
        <li><a href="/"><i class="fa fa-dashboard"></i> Пространство</a></li>
        <li><a href="/shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Магазин</a></li>
        <li class="active">Категории</li>
      </ol>
    </section>

@endsection


@section('content')


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')


        <div class="box box-primary">
            <div class="box-body">

				<div id="tree">	</div>
                    
            </div>
        </div>


    </div>


@endsection



@section('css')
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" /> --}}
		<link rel="stylesheet" type="text/css" href="/css/bootstrap-treeview.min.css">
@endsection



@section('scripts')



<script src="/js/bootstrap-treeview.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> --}}

<script type="text/javascript">
    {{-- window.jstree = require('https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js'); --}}

jQuery(function($) {


tree2 = [
			@foreach ( App\Models\Cat::where('parent_id',0)->get() as $line)
					@if ( count(App\Models\Cat::where('parent_id',$line->ident)->get())>0 )
						{ "text" : "{!!  $line->ident !!} {!! $line->name !!} {{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }}", nodes: [
						@foreach ( App\Models\Cat::where('parent_id',$line->ident)->get() as $line4)
								{text: "{{ $line4->name }}"},
						@endforeach
						] },
					@else
						{ "text" : "{!!  $line->ident !!} {!! $line->name !!} {{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }}" },

					@endif
			@endforeach
];


$('#tree').treeview({ data: tree2 });


  });

    


</script>


@endsection