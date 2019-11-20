@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Файловый менеджер
        <small>Version 0.1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Файлы</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <iframe src="/laravel-filemanager" width="100%" height="700px;"></iframe>
        </div>
	  </div>
    </section>


@endsection
