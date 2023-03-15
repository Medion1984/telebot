@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактировать {{ $order->id }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Упр. заказами</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @include('admin.errors')
          {{ Form::open(['route' => ['orders.update', $order->id ], 'method' => 'put']) }}
            <div class="card-body">
                <div class="form-group">
                  <label>Имя заказчика</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control {{$is_client}}" name="owner" value="{{ $order->owner }}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Телефон заказчика</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;0 (999) 99-99-99&quot;" data-mask="" inputmode="text" placeholder="___-__-__-__ " value="{{ $order->phone }}">
                  </div>
                </div>
                <div class="form-group">
                    <label>Адрес доставки/установки заказа</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" value="{{ $order->address }}" placeholder="Введите город или населенный пункт затем улицу и номер.">
                    </div>
                </div>
                <div class="form-group">
                    <label>Статус</label>
                    {{Form::select('status', 
                        $status, 
                        $order->status, 
                        ['class' => 'form-control'])
                      }}
                </div>
                <div class="form-group">
                    <label for="quantity">Количество</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Количество" name="quantity" value="{{$order->quantity}}">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать заказ</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
@section('custom_script')
<script>
$(function() {
    $('[data-mask]').inputmask()
})
</script>
@endsection

