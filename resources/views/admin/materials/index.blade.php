@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Материалы по категориям</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/admin' }}">Главная</a></li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ route('materials.create') }}" class="btn btn-block bg-gradient-success">Добавить материал</a>
          </div>
        </div>
    </section>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список материалов по категориям</h3>
              </div>
              <!-- ./card-header -->
              @include('admin.parts.cat_materials')
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection