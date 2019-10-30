@foreach(lecturer()->sessions() as $session)
    @if(nextSession($session->id))
        <option value="{{nextSession($session->id)->id}}">
        	{{nextSession($session->id)->name}}
        </option>
    @endif
    <option value="{{$session->id}}">
    	{{$session->name}}
    </option>
    @if(prevoiuseSession($session->id))
        <option value="{{prevoiuseSession($session->id)->id}}">
        	{{prevoiuseSession($session->id)->name}}
        </option>
    @endif
@endforeach