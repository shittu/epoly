@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Search your uploaded result</div>
		<div class="card-body">
			<form action="{{route('lecturer.result.search')}}" method="post">
				@csrf
		    	<select class="form-control" name="course">
		    		<option value="">Course</option>
		    		@foreach(lecturer()->lecturerCourses as $lecturer_course)
		    		    @if($lecturer_course->is_active == 1)
		                <option value="{{$lecturer_course->course->id}}">      {{$lecturer_course->course->code}}
		                </option>
		                @endif
		    		@endforeach
		    	</select><br>
		    	<select class="form-control" name="session">
		    		<option value="">Session</option>
		    		@foreach(lecturer()->sessions() as $session)
		                <option value="{{$session->name}}">
		                	{{$session->name}}      
		                </option>
		    		@endforeach
		    	</select><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Search Result</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
