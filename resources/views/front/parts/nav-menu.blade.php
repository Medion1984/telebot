<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a id="dropdown-menu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="nav-link dropdown-toggle">Каталог продукции по категориям</a>
        <ul aria-labelledby="dropdown-menu" class="dropdown-menu border-0 shadow">
            @include('front.parts.menu-recursive', ['categories' => $categories])
        </ul>
    </li>
</ul>