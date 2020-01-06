<ul>

    @foreach($childs as $child)

        <li>

            {{ $child->title }}
            
            
            <input type="checkbox" name="category_id[]" id="category_id" value="{{$child->id}}"
            ></input>


            @if(count($child->childs))
                @include('admin.products.manageChild',['childs' => $child->childs])
                
            @endif

        </li>
        <a href="{{url('/admin/edit-category/'.$child->id) }}" class=" btn-small">View</a> 

    @endforeach

</ul>