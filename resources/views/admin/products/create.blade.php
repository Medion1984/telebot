@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создать товар</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Товары</a></li>
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
          {{ Form::open(['route' => 'products.store']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="productName">Имя товара</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Краткое описание</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Цена себестоимости товара</label>
                    <input type="number" class="form-control" id="price" name="price" value="0">
                  </div>
                  <div class="form-group">
                    <label for="price_sale">Цена продажи товара</label>
                    <input type="number" class="form-control" id="price_sale" name="price_sale" value="0">
                  </div>
                  <div class="form-group">
                    <label>Единица измерения</label>
                    {{Form::select('measure', 
                        $measure, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Единица измерения'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Заметки</label>
                    {{Form::select('notices[]', 
                        $notices, 
                        null, 
                        ['class' => 'form-control select2','multiple' => 'multiple', 'data-placeholder' => 'Заметки'])
                      }}
                  </div>

                  <div class="form-group">
                    <label>Родительская категория</label>
                    <select name="category" class="form-control">
                        <option selected="selected" value>Выберите категорию товара</option>
                        @include('admin.parts.category', ['categories' => $categories])
                    </select>
                  </div>
                  <div class="form-group">
                    <h3>Материалы</h3>
                    @include('admin.parts.prod_materials')
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение товара</label>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox2" name="popular" value="1">
                        <label for="checkbox2">Популярный товар</label>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox3" name="action" value="1">
                        <label for="checkbox3">Акция</label>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox4" name="hit" value="1">
                        <label for="checkbox4">Хит</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать товар</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
  @section('custom_script')
  <script>
    $(function () {
        $(".select2").select2()
    })
  </script>
  @endsection

