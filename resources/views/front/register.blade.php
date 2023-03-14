@extends('front.layout')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="content">
        <div class="card card-info mt-3">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Регистрация</h3>
              </div>
              {!! Form::open(['route' => 'register']) !!}
              <div class="card-body">
                @include('front.errors')
                <div class="form-group">
                  <label>Введите логин</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите номер телефона</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;0 (999) 99-99-99&quot;" data-mask="" inputmode="text" placeholder="___-__-__-__ " value="{{ old('phone') }}">
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
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 d-flex">
                        <button type="submit" class="btn btn-success btn-block mr-2">Зарегистрироватся</button>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block">Войти</a>
                    </div>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_script')
<script>
$(function() {
    $('[data-mask]').inputmask()
})
</script>
@endsection