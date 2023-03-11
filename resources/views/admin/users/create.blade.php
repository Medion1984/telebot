@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создать пользователя</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Пользователи</a></li>
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
          {{ Form::open(['route' => 'users.store']) }}
            <div class="card-body">
            <div class="form-group">
                  <label>Введите логин</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите номер телефона</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;0 (999) 99-99-99&quot;" data-mask="" inputmode="text" placeholder="___-__-__-__ " value="{{old('phone')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите пароль</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label>Повторите пароль</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password_confirmation">
                  </div>
                </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Статус </label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать пользователя</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
@endsection
@section('custom_script')
<script>
$(function() {
    $('[data-mask]').inputmask()
})
</script>
@endsection
