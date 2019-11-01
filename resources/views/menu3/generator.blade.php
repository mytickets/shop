@extends('layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generator
        <small>Version 0.1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Генератор</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	{{-- {{ $session_id }} --}}
        	{{ $dbs2 }}
        	{{ $dbs3 }}
        	{{ $var1 }}
			{{ $session_id ?? '' }}

        	<ul>
        		
              @foreach($dbs as $db)
              	<li>{{ $db }}</li>
		      @endforeach
        	</ul>
        </div>

      </div>
      <!-- /.row -->

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			{{-- /generator_builder --}}
			<iframe src="/generator_builder" width="100%" height="800px;"></iframe>
	          <!-- /.info-box -->
        </div>

      </div>



    </section>
    <!-- /.content -->


@endsection

