<ul class="list-group">
@foreach($childs as $child)
	<li class="list-group-item">  Name : {{ $child->name }} , Email : {{ $child->email }}, Mobile No : {{ $child->mobile }} <span class="badge">{{ count($child->childs) }}</span>
	    
	@if(count($child->childs))
            @include('student.agent-details.manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>