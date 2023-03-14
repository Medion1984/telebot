@extends('front.layout')

@section('content')
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $category }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">{{ $category}}</li>
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
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
              <div class="col-12">
                <img src="{{ $product->getImage() }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}}</h3>
              <p>{{ $product->description }}</p>

              <hr>
              @include('front.parts.materials',['materials' => $materials])
              <hr>
              @include('front.parts.colors')

              @include('front.parts.polimers')

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                <b>@money($product->price_sale)</b> <small>сом</small>
                </h2>
                <h4 class="mt-0">
                  <small>Цена за {{ $measure }} изделия. </small>
                </h4>
              </div>

              <div class="mt-4">
                <a class="btn btn-primary btn-lg btn-flat" href="{{route('cart', $product->slug )}}">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Заказать
                </a>
              </div>

            </div>
          </div>
          @include('front.parts.notices', ['notices' => $notices])

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
@endsection