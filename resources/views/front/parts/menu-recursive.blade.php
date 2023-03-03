@foreach($categories as $category)
@if($category->isLeaf())
<li><a href="{{ route('category.products', $category->slug)}}" class="dropdown-item">{{$category->name}}</a></li>
@elseif($category->children)
<li class="dropdown-submenu">
    <a id="dropdownSubMenu{{$loop->iteration}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="dropdown-item dropdown-toggle">{{ $category->name }}</a>
    <ul aria-labelledby="dropdownSubMenu{{$loop->iteration}}" class="dropdown-menu border-0 shadow">
        @include('front.parts.menu-recursive', ['categories' => $category->children])
    </ul>
</li>
@endif
@endforeach