@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактировать материал</h1>
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
          {{ Form::open(['route' => ['materials.update', $material->id], 'method' => 'put']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="materialName">Имя материала</label>
                    <input type="text" class="form-control" id="materialName"  name="name" value="{{$material->name}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Цена материала</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $material->price }}">
                  </div>
                  <div class="form-group">
                    <label>Родительская категория</label>
                    <select name="category_material" class="form-control">
                        <option selected="selected" value="{{ $material->categories->id }}">{{ $material->categories->name }}</option>
                        @include('admin.parts.category', ['categories' => $categories])
                    </select>
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $material->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Отображение категории</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать материал</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
