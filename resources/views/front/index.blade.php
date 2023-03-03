@extends('front.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
         @include('front.parts.carousel')
      </div><!-- /.container-fluid -->
    </div>
    @include('front.parts.buttons-menu',['menu' => $menu])
<div class="content">
    <div class="container">
        <div class="card-columns">
            @foreach($products as $product)
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="prod-img" src="{{ $product->getImage() }}" alt="">
                    </div>
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          хит
                        </div>
                      </div>

                    <h3 class="profile-username text-center">{{ $product->name }}</h3>

                    <!-- <p class="text-muted text-center">Software Engineer</p> -->

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item text-center">
                            <b>Цена @money($product->price_sale)</b>
                        </li>
                    </ul>

                    <div class="btn-group w-100">
                      <a href="#" class="btn btn-success">
                      <i class="fas fa-shopping-cart"></i>
                         Добавить
                      </a>
                      <a href="{{ route('show', $product->slug)}}" class="btn btn-primary">
                       <i class="fas fa-eye"></i>
                          Посмотреть
                        </a>
                      <a href="#" class="btn btn-success">
                        <i class="fas fa-heart"></i>
                        Избранное
                      </a>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
</div>
@endsection

