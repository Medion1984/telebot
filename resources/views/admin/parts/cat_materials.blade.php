@foreach($categories as $category)
@php 
$category->status == null ? $status = 'not_active' : $status = '';
@endphp
<div class="card-body p-0">
    <table class="table">
        <tbody>
            @if($category->isLeaf())
            <tr>
                <td class="with_controls">
                    <p class="{{ $status }}">{{$category->name }}</p>
                    @if($category->materials->count() > 0)
                    <div class="controls">
                        <a href="{{ route('materials.show', $category->id)}}">Материалы {{ $category->materials->count() }}</a>
                    </div>
                    @else
                    <p> Материалов нет </a>
                    @endif
                </td>
            </tr>
            @elseif($category->children())
            <tr  aria-expanded="false" data-widget="expandable-table">
                <td class="with_controls">
                    <div class="{{ $status }}">
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        {{$category->name }}
                    </div>
                </td>
            </tr>
           
            <tr class="expandable-body d-none">
                <td>
                    <div class="p-0" style="display: none;">
                        @include('admin.parts.cat_materials', ['categories' => $category->children])
                    </div>
                </td>
            </tr>
            @endif

        </tbody>
    </table>
</div>
@endforeach