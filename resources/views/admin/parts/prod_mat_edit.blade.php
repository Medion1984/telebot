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
                        @if(in_array($item->id, $selected))
                        <option selected="selected" value="{{$item->id}}">{{ $item->name }}</option>    
                        @else             
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </optgroup>
            @endforeach
        @else
            @foreach($category->materials as $item)                    
                @if(in_array($item->id, $selected))
                <option selected="selected" value="{{$item->id}}">{{ $item->name }}</option>    
                @else             
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif
            @endforeach
        @endif
</select>
@endforeach