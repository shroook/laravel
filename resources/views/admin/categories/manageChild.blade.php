<ul>

    @foreach($childs as $child)

        <li>

            {{ $child->title }}
            
            
            <input type="radio" id="parent_id" name="parent_id" value="{{$child->id}}"
            @if($child->id==$categoryDetails->parent_id)checked @endif
            ></input>
            
            @if(count($child->childs))
                @include('admin.categories.manageChild',['childs' => $child->childs])
             @endif
        </li>
        <a href="{{url('/admin/edit-category/'.$child->id) }}" class=" btn-small">View</a> 

    @endforeach

</ul>