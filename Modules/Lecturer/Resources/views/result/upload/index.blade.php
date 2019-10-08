@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Upload Result Here</div>
		<div class="card-body">
			<form action="{{route('lecturer.result.upload.upload')}}" method="post" enctype="multipart/form-data">
				@csrf
		    	<select class="form-control" name="session">
		    		<option value="">Session</option>
		    		@foreach(lecturer()->sessions() as $session)
		                <option value="{{$session->id}}">
		                	{{$session->name}}
		                </option>
		    		@endforeach
		    	</select><br>
		    	<select class="form-control" name="course_id">
		    		<option value="">Course</option>
		    		@foreach(lecturer()->lecturerAvailableCourses() as $lecturer_course)
		                <option value="{{$lecturer_course->course->id}}">{{$lecturer_course->course->code}}
		                </option>
		    		@endforeach
		    	</select><br>
		    	<input type="file" name="result" class="form-control"><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Upload</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
