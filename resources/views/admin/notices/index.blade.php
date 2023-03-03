@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5>Управление заметками</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
          </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{ route('notices.create') }}" class="btn btn-block bg-gradient-success">Добавить заметку</a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Заметки</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Заметка</th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notices as $notice)
                    <tr>
                      <td>{{ $notice->id }}</td>
                      <td>{{ $notice->description }}</td>
                      <td><a href="{{ route('notices.edit', $notice->id) }}">Редактировать</a></td>
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