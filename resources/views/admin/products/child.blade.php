<ul>

    @foreach($childs as $child)

        <li>

            {{ $child->title }}
            
            
            <input type="checkbox" name="category_id[]" id="category_id" value="{{$child->id}}"
            {{in_array($child->id,$chks)?"checked":""}}
            ></input>

            @if(count($child->childs))
                @include('admin.products.child',['childs' => $child->childs])        
            @endif


        </li>
        <a href="{{url('/admin/edit-category/'.$child->id) }}" class=" btn-small">View</a> 
 @endforeach

</ul>