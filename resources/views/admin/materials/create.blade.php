@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создать материал</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('materials.index') }}">Материалы</a></li>
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
          {{ Form::open(['route' => 'materials.store']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Имя материала</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Введите имя категории" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Цена материала</label>
                    <input type="number" class="form-control" id="sorting" placeholder="Цена" name="price" value="0">
                  </div>
                  <div class="form-group">
                    <label>Родительская категория</label>
                    <select name="category_material" class="form-control">
                        <option selected="selected" value>Выберите категорию</option>
                        @include('admin.parts.category', ['categories' => $categories])
                    </select>
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение материала</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать материал</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
