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
                    <div class="controls">
                        <a href="{{ route('material_category.edit', $category->id)}}">Ред.</a>
                    </div>
                </td>
            </tr>
            @elseif($category->children())
            <tr  aria-expanded="false" data-widget="expandable-table">
                <td class="with_controls">
                    <div class="{{ $status }}">
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        {{$category->name }}
                    </div>
                    <div class="controls">
                        <a href="{{ route('material_category.edit', $category->id)}}">Ред.</a>
                    </div>
                </td>
            </tr>
           
            <tr class="expandable-body d-none">
                <td>
                    <div class="p-0" style="display: none;">
                        @include('admin.parts.materials', ['categories' => $category->children])
                    </div>
                </td>
            </tr>
            @endif

        </tbody>
    </table>
</div>
@endforeach