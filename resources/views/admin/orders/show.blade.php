@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Заказ №{{ $order->id }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Упр. заказами</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid" src="{{ $product->getImage()}}" alt="#">
                </div>

                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center">{{ $product->name }} {{ $product->marking }}</p>
                <p class="text-center">Себестоимость: <b>{{ $product->price }} за {{$product->getMeasureText()}}</b></p>
                <p class="text-center">Продажа: <b>{{ $product->price_sale }} за {{$product->getMeasureText()}}</b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Заказчик</b> <b class="float-right {{$is_client}}">{{$order->owner}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Телефон</b> <b class="float-right">{{ $order->phone }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Адрес</b> <b class="float-right">{{ $order->address }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Количество</b> <b class="float-right">{{ $order->quantity }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Статус заказа</b> <b class="float-right">{!! $order->getStatusText() !!}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Дата создания заказа</b> <b class="float-right">{{ $order->created_at }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Дата изменения заказа</b> <b class="float-right">{{ $order->updated_at }}</b>
                  </li>
                </ul>

                <a href="{{ route('orders.index') }}" class="btn btn-primary"><b>Назад</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection