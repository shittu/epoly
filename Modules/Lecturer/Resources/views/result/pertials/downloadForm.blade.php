<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Download Result Templete Here</div>
		<div class="card-body">
			<form action="{{route($route ?? 'lecturer.result.templete.download')}}" method="post">
				@csrf
		    	<select class="form-control" name="course">
		    		<option value="">Course</option>
		    		@include('lecturer::result.pertials.course')
		    	</select><br>
		    	<select class="form-control" name="session">
		    		<option value="">Session</option>
		    		@include('lecturer::result.pertials.session')
		    	</select><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Download Result Templete</button>
		    </form>
		</div>
	</div>
</div>