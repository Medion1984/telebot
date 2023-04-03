@extends('front.layout')
@section('title', '- Сварочные работы в Бишкеке' )
@section('description', "Изготовление ворот, навесов, заборов в Бишкеке")
@section('keywords', "ворота,навесы,заборы" )
@section('content')
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Оформление заказа</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">Оформление заказа</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h3 class="d-inline-block">{{$product->name}} {{ $product->marking }}</h3>
              <p>{{ $product->description }}</p>

              <hr>
              <div class="col-12">
                <img src="{{ $product->getImage() }}" class="cart-img" alt="#">
              </div>
            </div>
            <div class="col-12">
              <hr>

              <div class="bg-gray py-2 px-3 mt-4">
              @if($product->price_sale != 0)
                <h2 class="mb-0">
                <b>От @money($product->price_sale)</b> <small>сом</small>
                </h2>
                <h4 class="mt-0">
                  <small>Цена за {{ $measure }} изделия. </small>
                </h4>
                @else 
                <h4 class="mb-0">
                <b>Цена договорная</b>
                </h4>
                @endif
              </div>

            </div>
          </div>
          @if(!empty($notices))
          @include('front.parts.notices', ['notices' => $notices])
          @endif
          @include('front.parts.orderform', ['slug' => $product->slug])
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
@section('custom_script')
<script>
$(function() {
    $('[data-mask]').inputmask()
})
</script>
@endsection