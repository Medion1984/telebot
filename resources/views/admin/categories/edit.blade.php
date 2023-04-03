@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактировать категорию</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
              <li class="breadcrumb-item active">Редактировать категорию</li>
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
          {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Имя категории</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Введите имя категории" name="name" value="{{ $category->name}}">
                  </div>
                  <div class="form-group">
                    <label for="description">СЕО описание</label>
                    <input type="text" class="form-control" id="description" placeholder="СЕО описание" name="description" value="{{ $category->description }}">
                  </div>
                  <div class="form-group">
                    <label for="keywords">Ключевые слова</label>
                    <input type="text" class="form-control" id="keywords" placeholder="Ключевые слова" name="keywords" value="{{ $category->keywords }}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Сортировка</label>
                    <input type="number" class="form-control" id="sorting" placeholder="Сортировка" name="sort" value="{{ $category->sort}}">
                  </div>
                  <div class="form-group">
                    <label>Родительска категория</label>
                    {{Form::select('parent_id', 
                        $categories, 
                        $category->parent_id, 
                        ['class' => 'form-control', 'placeholder' => 'Нет категории'])
                      }}
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $category->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Оторажение категории</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать категорию</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
