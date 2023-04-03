@extends('front.layout')
@section('title', '- ' . $category->name )
@section('description', $category->description )
@section('keywords', $category->keywords )
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            @include('front.parts.banner')
        </div><!-- /.container-fluid -->
    </div>
    <div class="content-header">
        <div class="container text-center">
            <h3>{{ $category->name }}</h3>
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
                            @if($product->price != 0)
                            <li class="list-group-item text-center">
                                <b>Цена от @money($product->price_sale) {{$measures[$product->measure]}}</b>
                            </li>
                            @else
                            <li class="list-group-item text-center">
                                <b>Цена договорная</b>
                            </li>
                            @endif
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