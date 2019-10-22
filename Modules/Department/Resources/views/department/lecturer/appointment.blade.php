<!-- modal -->
<div class="modal fade" id="lecturer_{{$staff->lecturer->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('department.lecturer.appointment.register')}}">
            		<input type="hidden" name="lecturer_id" value="$staff->lecturer->id">
            		<select name="appointment" class="form-control">
            			<option value="">Appointment</option>
            			<option value="1">Exam Officer</option>
            		</select><br>
                    <button class="button-fullwidth cws-button bt-color-3 btn-block">Register</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->