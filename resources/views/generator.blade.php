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

          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Generator</a></li>
              <li><a href="#tab_2" data-toggle="tab">DB Tables</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <ul>
                  <iframe src="/generator_builder" width="100%" height="800px;"></iframe>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                    @foreach($dbs as $db)
                      <li>{{ $db }}</li>
                    @endforeach
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->

        	{{-- {{ $session_id }} --}}
			{{ $session_id ?? '' }}
        </div>

      </div>
      <!-- /.row -->

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			{{-- /generator_builder --}}
  			{{-- <iframe src="/generator_builder" width="100%" height="800px;"></iframe> --}}
	          <!-- /.info-box -->
        </div>

      </div>



    </section>
    <!-- /.content -->


@endsection

