@extends('front.layout')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="content">
        <div class="card card-info mt-3">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Авторизация</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Введите номер телефона</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 99-99-99&quot;" data-mask="" inputmode="text" placeholder="___-__-__-__ ">
                  </div>
                </div>
                <div class="form-group">
                  <label>Введите пароль</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control">
                  </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 d-flex">
                        <button type="submit" class="btn btn-success btn-block mr-2">Войти</button>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-block">Зарегистрироватся</a>
                    </div>
                </div>
              </div>
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