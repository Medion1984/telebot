<div class="d-flex flex-wrap">
    @foreach($menu as $item)
    <a href="{{ route('category.products', $item->slug)}}"
        class="btn btn-anchor btn-inline btn-outline-success mr-1 mb-1">{{ $item->name }}</a>
    @endforeach
</div>