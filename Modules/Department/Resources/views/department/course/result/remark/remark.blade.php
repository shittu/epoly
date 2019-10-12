<!-- modal -->
<div class="modal fade" id="registration_{{$registration->id}}_remark" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('department.result.remark.register')}}" method="post">
            		@csrf
	            	<select class="form-control" name="remark">
	            		<option value="">Remark</option>
	            		@foreach($registration->remarks() as $remark)
	                        <option value="{{$remark->id}}">{{$remark->name}}</option>
	            		@endforeach
	            	</select><br>
	            	<select class="form-control" name="course">
	            		<option value="">Course</option>
	            		@foreach($registration->sessionCourseRegistrations as $course_registration)
	                        <option value="{{$course_registration->course->id}}">{{$course_registration->course->code}}</option>
	            		@endforeach
	            	</select><br>
	            	<button class="button-fullwidth cws-button bt-color-3 btn-block">
		            	Register
		            </button>
	            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->