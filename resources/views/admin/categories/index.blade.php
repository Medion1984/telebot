@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Категории</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/admin' }}">Главная</a></li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ route('categories.create') }}" class="btn btn-block bg-gradient-success">Добавить категорию</a>
          </div>
        </div>
    </section>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список категорий</h3>
              </div>
              <!-- ./card-header -->
              @include('admin.parts.recursive')
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection

  @section('custom_script')
  <script>
    const controls = document.querySelectorAll('.controls')
    controls.forEach(control => control.addEventListener('click', e => e.stopPropagation()))
  </script>
  @endsection