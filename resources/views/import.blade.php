@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Импорт данных
        <small>Rkeeper 0.1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Импорт</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6">
				<a href="/import_run" class="btn btn-danger">Запуск импорта</a>
			</div>
		</div>
    </section>


@endsection

