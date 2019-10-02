@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Download Result Templete Here</div>
		<div class="card-body">
			<form action="{{route('lecturer.result.templete.download')}}" method="post">
				@csrf
		    	<select class="form-control" name="course_id">
		    		<option value="">Course</option>
		    		@foreach(lecturer()->lecturerCourses as $lecturer_course)
		    		    @if($lecturer_course->is_active == 1)
		                <option value="{{$lecturer_course->course->id}}">      {{$lecturer_course->course->code}}
		                </option>
		                @endif
		    		@endforeach
		    	</select><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Download Result Templete</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
