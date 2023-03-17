@extends('front.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header pxs0">
      <div class="container pxs0 carxs">
         @include('front.parts.carousel')
      </div><!-- /.container-fluid -->
    </div>
    <div class="content-header pxs0">
      <div class="container my-2">
        @include('front.parts.buttons-menu',['menu' => $menu])
      </div>
    </div>
<div class="content">
    <div class="container">
        <div class="card-columns">
            @foreach($products as $product)
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="prod-img" src="{{ $product->getImage() }}" alt="">
                    </div>
                    @if($product->hit != null)
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          хит
                        </div>
                      </div>
                    @elseif($product->action != null)
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-lg">
                          акция
                        </div>
                      </div>
                    @endif
                    <h3 class="profile-username text-center">{{ $product->name }} {{ $product->marking }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item text-center">
                            <b>Цена @money($product->price_sale) за {{$measures[$product->measure]}}</b>
                        </li>
                    </ul>

                    <div class="btn-group w-100">
                      <a href="{{route('ordering', $product->slug )}}" class="btn btn-success">
                      <i class="fas fa-shopping-cart"></i>
                         Заказать
                      </a>
                      <a href="{{ route('show', $product->slug)}}" class="btn btn-primary">
                       <i class="fas fa-eye"></i>
                          Посмотреть
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
@section('custom_script')
<script>
  $(function(){
    if(sessionStorage.getItem('user') === null){
      $.ajax({
        url: "/api/setUser",
        method: "GET",
        data: {
            user: true
        },
        success: function(data){
          if(data) sessionStorage.setItem('user', data);
        }
    })
    }
  })
</script>
@endsection
