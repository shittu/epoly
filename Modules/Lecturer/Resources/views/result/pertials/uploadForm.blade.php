<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Upload Result Here</div>
		<div class="card-body">
			<form action="{{route($route ?? 'lecturer.result.upload.upload')}}" method="post" enctype="multipart/form-data">
				@csrf
		    	<select class="form-control" name="course">
		    		<option value="">Course</option>
		    		@include('lecturer::result.pertials.course')
		    	</select><br>
		    	<select class="form-control" name="session">
		    		<option value="">Session</option>
		    		@include('lecturer::result.pertials.session')
		    	</select><br>
		    	<input type="file" name="result" class="form-control"><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Upload</button>
		    </form>
		</div>
	</div>
</div> 