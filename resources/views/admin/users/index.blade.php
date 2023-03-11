@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Пользователи</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
              <li class="breadcrumb-item active">Пользователи</li>
            </ol>
          </div>
            <div class="col-sm-6">
                <a href="{{ route('users.create') }}" class="btn btn-block bg-gradient-success mt-3">Добавить пользователя</a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Пользователи</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          №
                      </th>
                      <th style="width: 20%">
                          Имя                  
                      </th>
                      <th style="width: 30%">
                          Телефон
                      </th>
                      <th>
                          Статус
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                      <td>
                          {{ $user->id }}
                      </td>
                      <td>
                          {{ $user ->name }}
                      </td>
                      <td>
                          {{ $user->phone }}
                      </td>
                      <td>
                          {{ $user->status }}
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection