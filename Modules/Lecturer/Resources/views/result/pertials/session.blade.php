@php
    $lecturer = null;
    if(lecturer()){
        $lecturer = lecturer();
    }elseif(examOfficer()){
        $lecturer = examOfficer()->lecturer;
    }elseif(headOfDepartment()){
        $lecturer = headOfDepartment()->staff->lecturer;
    }
@endphp
@if($lecturer)
	@foreach($lecturer->sessions() as $session)
	    @if(nextSession($session->id))
	        <option value="{{nextSession($session->id)->id}}">
	        	{{nextSession($session->id)->name}}
	        </option>
	    @endif
	    <option value="{{$session->id}}">
	    	{{$session->name}}
	    </option>
	    @if(previousSession($session->id))
	        <option value="{{previousSession($session->id)->id}}">
	        	{{previousSession($session->id)->name}}
	        </option>
	    @endif
	@endforeach
@endif