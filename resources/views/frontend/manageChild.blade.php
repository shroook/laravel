
<ul>

    @foreach($childs as $child)
    <a  href="{{url('/view-product/'.$child->id) }}">
        <li>
        
            {{ $child->title }}
            
            @if(count($child->childs))

                @include('frontend.manageChild',['childs' => $child->childs])

            @endif

        </li>
        <a href="{{url('/view-product/'.$child->id) }}" class=" btn-small">View</a>

        </a>
    @endforeach

</ul>