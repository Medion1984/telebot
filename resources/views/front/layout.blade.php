
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Устаке</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="/css/front.css">
  <link rel="stylesheet" href="/css/front-styles.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="/images/logimini.png" alt="Ustake logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Устаке</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        
        @include('front.parts.nav-menu')

      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link"  href="/favorite">
            <i class="fas fa-heart"></i>
            <span class="badge badge-danger navbar-badge">0</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="/cart">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge">0</span>
          </a>
        </li>
        @if(Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link"  href="/logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link"  href="/login">
            <i class="fas fa-sign-in-alt"></i>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>

  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
      <!-- To the right -->
      <div class="float-right d-flex flex-column">
          <a href="#" class="text-primary"><i class="fab fa-whatsapp mr-2"></i> <strong> 0 501 32 90 79</strong></a>
          <a href="#" class="text-primary"><i class="fas fa-phone-alt mr-2"></i><strong> 0 501 32 90 79</strong></a>
          <a href="#" class="text-primary"><i class="fab fa-telegram-plane mr-2"></i><strong> 0 501 32 90 79</strong></a>
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2023 <a href="/">Ustake</a>.</strong> 
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/front.js"></script>
@yield('custom_script')
</body>
</html>
