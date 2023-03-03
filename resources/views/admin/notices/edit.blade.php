@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактировать заметку</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('notices.index') }}">Упр. заметки</a></li>
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
          {{ Form::open(['route' => ['notices.update', $notice->id] , 'method' => 'put']) }}
            <div class="card-body">
                <div class="form-group">
                    <label>Заметка</label>
                    <textarea class="form-control" rows="6" name="description" value="{{ old('description') }}">{{ $notice->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Редактировать заметку</button>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
