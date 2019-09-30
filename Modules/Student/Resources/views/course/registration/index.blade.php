@extends('student::layouts.master')

@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Please specify the session of the registration</div>
		<div class="card-body">
			<form action="{{route('lecturer.result.upload.upload')}}" method="post" enctype="multipart/form-data">
				@csrf
				<label>Session</label>
		    	<select class="form-control" name="course_id">
		    		<option value="{{date('Y')}} / {{date('Y')+1}}">{{date('Y')}} / {{date('Y')+1}}</option>
		    		
	                <option value="{{date('Y')-1}} / {{date('Y')}}">      {{date('Y')-1}} / {{date('Y')}}
	                </option>
		    	</select><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Contenue</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
