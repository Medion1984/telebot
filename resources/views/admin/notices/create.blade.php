@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создать заметку</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('notices.index') }}">Заметки</a></li>
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
          {{ Form::open(['route' => 'notices.store']) }}
            <div class="card-body">
                <div class="form-group">
                    <label>Заметка</label>
                    <textarea class="form-control" rows="6" name="description" value="{{ old('descripton') }}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Создать заметку</button>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
