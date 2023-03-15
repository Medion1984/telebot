<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Админпанель</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="/css/styles.css">
  @yield('special_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{'/admin' }}" class="nav-link">Админпанель</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('orders.index') }}">
          <i class="far fa-comments"></i>
          <span class="badge badge-success navbar-badge">{{ $working_orders}}</span>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('orders.index') }}">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $fresh_orders }}</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ '/admin' }}" class="brand-link">
      <img src="/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Админпанель</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('users.index') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Меню</li>
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Товары
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Категории
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('materials.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Материалы
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('material_category.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                MaтКатегории
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Пользователи
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Заказы
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('notices.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Заметки
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Версия</b> 1.0.0 Бета тест
    </div>
    <strong>Копирайт &copy; 2012-2023<a href="https://welding.kg">Устаке</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- AdminLTE for demo purposes -->
<script src="/js/admin.js"></script>
@yield('custom_script')
</body>
</html>
