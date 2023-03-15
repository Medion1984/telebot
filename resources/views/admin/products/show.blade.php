@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Товары категории {{ $category->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Упр. товарами</a></li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ route('products.create') }}" class="btn btn-block bg-gradient-success">Добавить товар</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Товары</h3>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          №
                      </th>
                      <th>
                          Изображение
                      </th>
                      <th>
                          Название
                      </th>
                      <th>
                          Цена
                      </th>
                      <th>
                          Продажа
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  @php 
                    $product->status == null ? $status = 'not_active' : $status = '';
                  @endphp
                  <tr>
                      <td>
                          {{ $loop->iteration }}
                      </td>
                      <td>
                          <div class="div__image">
                            <img src="{{ $product->getImage() }}" alt="#" class="product__image">
                          </div>
                      </td>
                      <td class="{{ $status }}">
                          {{ $product->name }}
                      </td>
                      <td>
                          {{ $product->price }}
                      </td>
                      <td>
                          {{ $product->price_sale }}
                      </td>
                      <td>
                        @if($product->hit != null)
                          <p class="text-warning m-0"> хит </p>
                        @elseif($product->action != null)
                          <p class="text-danger m-0"> акция </p>
                        @endif
                      </td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{ route('products.photo', $product->id) }}" class="btn btn-info"><i class="far fa-image"></i></a>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
  </div>
  @endsection

