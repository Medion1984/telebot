@extends('admin.layout')

@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Заказы</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
              <li class="breadcrumb-item active">Заказы</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список всех заказов</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Заказчик</th>
                      <th>Телефон</th>
                      <th>Товар</th>
                      <th>Статус</th>
                      <th>Дата</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->owner }}</td>
                      <td>{{ $order->phone }}</td>
                      <td>{{ $order->getProduct()->name}} {{ $order->getProduct()->marking }}</td>
                      <td>{!! $order->getStatusText() !!}</td>
                      <td>{{ $order->created_at }}</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection