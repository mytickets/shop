@extends('layouts.app')


@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Категории
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

            <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"  >
                  <a href="/cats" >Таблица</a>
                </li>
                <li role="presentation" class="active">
                  {{-- <a href="#tab_card" aria-controls="profile" role="tab" data-toggle="tab">Дерево</a> --}}
                  <a href="/cats_tree" >Дерево</a>
                </li>
              </ul>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade   in active" id="tab_card">

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

                <div id="tree"></div>
    </div>

                    
                </div>
              </div>
                    
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
			{{-- @foreach ( App\Models\Cat::where('parent_id',0)->get() as $line) --}}
      @foreach ( $cats as $line)



					@if ( count(App\Models\Cat::where('parent_id',$line->ident)->get())>0 )
						{ "text" : "{!! $line->name !!} ({{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }})", nodes: [
						@foreach ( App\Models\Cat::where('parent_id',$line->ident)->get() as $line4)

             @if ( count(App\Models\Cat::where('parent_id',$line4->ident)->get())>0 )
								{text: "<a href='/cats/{{ $line4->ident }}'>{{ $line4->name }} ({{ count(App\Models\Cat::where('parent_id',$line4->ident)->get()) }})</a>", nodes: [

                    @foreach ( App\Models\Cat::where('parent_id',$line4->ident)->get() as $line5)

                        @if ( count(App\Models\Cat::where('parent_id',$line5->ident)->get())>0 )
                          {text: "<a href='/cats/{{ $line5->ident }}'>{{ $line5->name }} ({{ count(App\Models\Cat::where('parent_id',$line5->ident)->get()) }})</a>"},
                        @else
                            {text: "<a href='/cats/{{ $line5->ident }}'>{{ $line5->name }} ({{ count(App\Models\Cat::where('parent_id',$line5->ident)->get()) }})</a>"},
                        @endif

                    @endforeach
                ]
              },
             @else
                    {text: "<a href='/cats/{{ $line4->ident }}'>{{ $line4->name }} ({{ count(App\Models\Cat::where('parent_id',$line4->ident)->get()) }})</a>"},
             @endif 
						@endforeach
						] },
					@else
						{ "text" : "{!! $line->name !!} ({{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }})" },

					@endif
			@endforeach
];


$('#tree').treeview({ data: tree2 });


  });

    


</script>


@endsection








