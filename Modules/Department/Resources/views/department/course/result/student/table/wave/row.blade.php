    <tr>
    	<td>
    		{{strtoupper($registration->sessionRegistration->student->first_name)}} {{strtoupper($registration->sessionRegistration->student->last_name)}}
    	</td>

    	<td>
    		{{$registration->sessionRegistration->student->admission->admission_no}}
    	</td>

    	<td >
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		    {{$course_registration->course->code}}<br>
    		@endforeach
    	</td>

    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{$course_registration->course->unit}}<br>
    		@endforeach
    	</td>

    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{$course_registration->result->grade}}<br>
    		@endforeach
    	</td>

    	<td>
        	@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{number_format($course_registration->result->points,2)}}<br>
    		@endforeach
    	</td>
            
    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{number_format($course_registration->course->unit * $course_registration->result->points,2)}}
    		<br>
    		@endforeach
    	</td>
            
    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
	    		@if($course_registration->result->grade == 'F')
	    		    <a href="" style="color: white"><button class="btn btn-primary">Wave {{$course_registration->course->code}}</button></a>
	    		@endif
    		@endforeach
    	</td>
    </tr>