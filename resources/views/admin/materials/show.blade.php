@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5>Управление материалами</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materials.index') }}">Упр. материалами</a></li>
              <li class="breadcrumb-item active">{{ $name }}</li>            </ol>
          </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{ route('materials.create') }}" class="btn btn-block bg-gradient-success">Добавить материал</a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @include('admin.errors')
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Материалы категории {{ $name }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Наименование материала</th>
                      <th>Цена</th>
                      <th style="width: 40px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($materials as $material)
                    @php 
                        $material->status == null ? $status = 'not_active' : $status = '';
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="{{ $status }}">{{ $material->name }}</td>
                      <td><bold>{{ $material->price }}</bold></td>
                      <td><a href="{{ route('materials.edit', $material->id) }}">Редактировать</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection