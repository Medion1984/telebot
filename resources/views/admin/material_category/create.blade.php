@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создать категорию для материала</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('material_category.index') }}">Категории материалов</a></li>
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
          {{ Form::open(['route' => 'material_category.store']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Имя категории материала</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Введите имя категории" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Сортировка</label>
                    <input type="number" class="form-control" id="sorting" placeholder="Сортировка" name="sort" value="1">
                  </div>
                  <div class="form-group">
                    <label>Родительска категория</label>
                    {{Form::select('parent_id', 
                        $categories, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Выберите категорию материала'])
                      }}
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение категории</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать категорию материала</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
