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
            @if(session('success'))
              <div class="alert alert-success alert-dismissible w-100">
                <h7><i class="icon fas fa-ban"></i></h7>
                  {{session('success')}}
              </div>
            @endif
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->name}} {{ $product->marking }}</h3>
              <div class="col-12">
                <img src="{{ $product->getImage() }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}} {{ $product->marking }}</h3>
              <p>{{ $product->description }}</p>

              <hr>
              @include('front.parts.materials',['materials' => $materials])
              <hr>
              @include('front.parts.colors')

              @include('front.parts.polimers')

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

              <div class="mt-4">
                <a class="btn btn-primary btn-lg btn-flat" href="{{route('ordering', $product->slug )}}">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Заказать
                </a>
              </div>

            </div>
          </div>
          @if(!empty($notices))
          @include('front.parts.notices', ['notices' => $notices])
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
@endsection