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
        <li><a href="/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Магазин</a></li>
        <li class="active">Категории</li>
      </ol>
    </section>

@endsection


@section('content')

  <style type="text/css">
  .label_node_name {
    min-width: 10em;
    text-align: left;
  }
  .label_node_name_icon {
    text-align: right;
  }
  a:hover {
    text-decoration: underline;
  }

  </style>

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
        {{-- <div class="clearfix"></div> --}}

        


<h3>  Дерево меню</h3>
<div id="tree_ul">

<table class=""> 
  <thead> 
    <th class="label label-warning">Вкл/Выкл</th>
    <th class="label label-success">Раскрыть <i class="fa fa-caret-down" aria-hidden="true"></i></th>
    <th class="label label-primary">Категорий</th>
    <th class="label label-info">Продуктов</th>
    <th class="label label-default">Ссылка<i class="fa fa-link" aria-hidden="true"></i></a></th>
  </thead>
</table>

  @php


      function renderNode($node) {

        if ($node->menu){
          $m="V";
          $mcolor="success";
        } else { 
          $m="X";
          $mcolor="default";
      }
            $node_ident=$node->ident;
            $count1 = count(App\Models\Cat::where('parent_id',$node->ident)->get());
            $count2 = count(App\Models\Product::where('cat_id',$node->ident)->get());
            $node_name=$node->name;


        if ( count(App\Models\Cat::where('parent_id',$node->ident)->get())>0 ) {
          // $html = '<li>'   . '<span class="badge label label-'.$mcolor.' menu_check" data-id="'.$node->ident.'">'.$m.'</span><span class="badge label label-primary">'. count(App\Models\Cat::where('parent_id',$node->ident)->get()).'кат.</span> <span class="badge label label-info">'. count(App\Models\Product::where('cat_id',$node->ident)->get()).'шт.</span> <span class="badge label label-success"><a style="color:black;" data-toggle="collapse" href="#cola_'.$node->ident.'">'. $node->name .'<i class="fa fa-caret-down" aria-hidden="true"></i></a></span>  <a target="_blank" href="/cats/'.$node->ident.'"><i class="fa fa-link" aria-hidden="true"></i></a>';


            $html = <<<EOT
              <li>

              <span class="badge label label-$mcolor menu_check" data-id="$node_ident">$m</span>

              <span class="badge label label-success label_node_name">
                <a style="color:black;" data-toggle="collapse" href="#cola_$node_ident">
                  <span class="label_node_name_icon">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </span>
                  $node_name
                </a>
              </span>

              <span class="badge label label-primary">
                $count1 кат.
              </span>
              <span class="badge label label-info">
                $count2 шт.
              </span>
              <a target="_blank" href="/cats/$node_ident">
                <i class="fa fa-link" aria-hidden="true"></i>
              </a>
            EOT; 

          // $html .= '<ul id="cola_'.$node->ident.'" class="collapse ">'; 
          $html .= "<ul id='cola_{$node_ident}' class='collapse '>"; 

          foreach($node->children as $child)
            {
              $html .= renderNode($child);
            }

          $html .= '</ul>';
          $html .= '</li>';
        } else {

            $html2 = <<<EOT
              <li>
              
              <span class="badge label label-$mcolor menu_check" data-id="$node_ident">$m</span>

              <span class="badge label label-default label_node_name">
                <a style="color:black;" target="_blank" href="/cats/$node_ident">
                  <span class="label_node_name_icon">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </span>
                  $node_name
                </a>
              </span>

              <span class="badge label label-primary">
                $count1 кат.
              </span>
              <span class="badge label label-info">
                $count2 шт.
              </span>
              <a target="_blank" href="/cats/$node_ident">
                <i class="fa fa-link" aria-hidden="true"></i>
              </a>
            EOT; 

            return $html2;
              // return '<li>' . '<span class="badge label label-'.$mcolor.' menu_check" data-id="'.$node->ident.'">'.$m.'</span><span class="badge label label-primary">'. count(App\Models\Cat::where('parent_id',$node->ident)->get()).'кат.</span> <span class="badge label label-info">'. count(App\Models\Product::where('cat_id',$node->ident)->get()).'шт.</span> <a target="_blank" href="/cats/'.$node->ident.'">'. $node->name .'</a>  <a target="_blank" href="/cats/'.$node->ident.'"><i class="fa fa-link" aria-hidden="true"></i></a></li>';

            }

        return $html;
      };

      function renderJ($node) {

        $html = '{ text' . $node->name;

        if ( count(App\Models\Cat::where('parent_id',$node->ident)->get())>0 ) {
          $html = '{ text:"' . $node->name.'"';
          $html .= ', "nodes": [';
          foreach($node->children as $child)
            $html .= renderJ($child).',';
          $html .= ']';
          $html .= '}';

        // if( $node->isLeaf() ) {
        } else {
          // {{  }}
          return '{ text:"' . $node->name .'"}';
        }
          $html .= '}';

        return $html;
      };


  @endphp

    @foreach ( $cats as $line)
        {!! renderNode($line) !!}
    @endforeach

</div>

                {{-- <h4> Дерево  </h4> --}}
                {{-- <div id="tree"></div> --}}


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
						{ text : "<a style='color:black;' href='/cats/{{ $line->ident }}'>{!! $line->name !!}</a> <span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }})кат.</span>", nodes: [
						@foreach ( App\Models\Cat::where('parent_id',$line->ident)->get() as $line4)

             @if ( count(App\Models\Cat::where('parent_id',$line4->ident)->get())>0 )
								{text: "<a style='color:black;' href='/cats/{{ $line4->ident }}'>{{ $line4->name }} </a><span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line4->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line4->ident)->get()) }})кат.</span>", nodes: [

                    @foreach ( App\Models\Cat::where('parent_id',$line4->ident)->get() as $line5)

                        @if ( count(App\Models\Cat::where('parent_id',$line5->ident)->get())>0 )
                            {text: "<a style='color:black;' href='/cats/{{ $line5->ident }}'>{{ $line5->name }}</a> <span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line5->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line5->ident)->get()) }})кат.</span>"},
                        @else
                            {text: "<a style='color:black;' href='/cats/{{ $line5->ident }}'>{{ $line5->name }} </a><span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line5->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line5->ident)->get()) }})кат.</span>"},
                        @endif

                    @endforeach
                ]
              },
             @else
                    {text: "<a style='color:black;' href='/cats/{{ $line4->ident }}'>{{ $line4->name }} </a><span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line4->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line4->ident)->get()) }})кат.</span>"},
             @endif 
						@endforeach
						] },
					@else
						{ text : "<a style='color:black;' href='/cats/{{ $line->ident }}'>{!! $line->name !!} </a><span class='badge label label-primary'>{{ count(App\Models\Product::where('cat_id',$line->ident)->get()) }}шт.</span> <span class='badge label label-success'>({{ count(App\Models\Cat::where('parent_id',$line->ident)->get()) }})кат.</span>" },

					@endif
			@endforeach
];


    // $('#tree').treeview({ data: tree2 });
    $('.menu_check').click(function(e){
          var t1 = this;
        console.log( $(this).data('id') )
          // check_menu
          $.ajax({
              url: '/cats/'+$(this).data('id')+'/check_menu',
              type: 'GET',
              success: function(result) {
                  console.log( result[0] )
                  console.log( result[1] )
                  console.log( $(t1).text(result[0]) )

                  $(t1).removeClass('label-default')
                  $(t1).removeClass('label-success')
                  $(t1).addClass('label-'+result[1])
                    // label-

                  // $()
              }
          });
    }) // $('.menu_check').click


  }); // jQuery(function($){

</script>

@endsection
