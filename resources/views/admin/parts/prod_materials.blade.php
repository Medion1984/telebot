@foreach($materials as $category)
<label>{{ $category->name }}</label>
<select class="select2 select2-hidden-accessible" 
        name="materials[]"
        multiple 
        data-placeholder="Выберите материал" 
        style="width: 100%;">
        @if(!$category->isLeaf())
            @foreach($category->children as $material)                 
                <optgroup label="{{ $material->name }}">
                    @foreach($material->materials as $item)                    
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        @else
            @foreach($category->materials as $item)                    
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        @endif
    </optgroup>
</select>
@endforeach