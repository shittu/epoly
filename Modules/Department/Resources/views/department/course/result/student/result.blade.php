@extends('department::layouts.master')

@section('page-content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
    	UMARU ALI SHINKAFI POLYTECNIC SOKOTO<br>
    	COLLEGE OF SCIENCE AND TECHNOLOGY<br>
    	DEPARTMENT OF COMPUTER SCIENCE<br>
    	SECOND SEMESTER EXAMINATION RESULTS, 2017/2018 SESSION<br>
    	NATIONAL DIPLOMA IN COMPUTER SCIENCE II (MORNING)<br>
    	NDSC II (M)
    </div>
     	
     			<table class="table table-border" >
     				<thead>
     					<tr>
     						<td>Name</td>
     						<td>ADMISSION NO</td>
     						<td>COURSE CODE</td>
     						<td>UNIT (S)</td>
     						<td>GRADE</td>
     						<td>POINTS</td>
     						<td>GRADE POINT</td>
     						<td>PREV UNIT</td>
     						<td>CURR. SEM. UNITS</td>
     						<td>GP THIS SEM</td>
     						<td>GP AS AT LAST SEM</td>
     						<td>CUMM G.P</td>
     						<td>G.P THIS SEM</td>
     						<td>C G.P A</td>
     						<td>CUMM G.P</td>
     						<td>SEM. REMARKS</td>
     						<td>GEN. REMARKS</td>
     					</tr>
     				</thead>
     				<tbody>
     					@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $registration)
                            <tr>
                            	
                            	<td>
                            		{{$registration->sessionRegistration->student->first_name}} {{$registration->sessionRegistration->student->last_name}}
                            	</td>

                            	<td>
                            		{{$registration->sessionRegistration->student->admission->admission_no}}
                            	</td>

                            	<td >
                            		@foreach($registration->courseRegistrations as $course_registration)
                            		    {{$course_registration->course->code}}<br>
                            		@endforeach
                            	</td>

                            	<td>
                            		@foreach($registration->courseRegistrations as $course_registration)
                            		{{$course_registration->course->unit}}<br>
                            		@endforeach
                            	</td>

                            	<td>
                            		@foreach($registration->courseRegistrations as $course_registration)
                            		{{$course_registration->result->grade}}<br>
                            		@endforeach
                            	</td>

                            	<td>
	                            	@foreach($registration->courseRegistrations as $course_registration)
                            		{{$course_registration->result->points}}<br>
                            		@endforeach
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		
                            	</td>

                            	<td>
                            		@if($registration->sessionRegistration->hasUpload(request()->route('semester_id')))
	                            		@if(empty($registration->failedResults(request()->route('semester_id'))))
	                                        Pass <br>
	                            		@elseif($registration->passedResults(request()->route('semester_id')) == 0)
	                                        @if(request()->route('semester_id') == 2)
                                                Withdraw
	                                        @else
	                                            Fail <br>
	                                        @endif
	                            		@else
	                                        @foreach($registration->failedResults(request()->route('semester_id')) as $course)
	                                            Repeat {{$course->code}}<br>
	                                        @endforeach
	                            		@endif
	                            	@endif
	                            	@foreach($registration->sessionRegistration->sessionRegistrationRemarks as $emc_remark)
                                        {{'EMC Verdict'}} {{$emc_remark->remark->name}} <br>
	                            	@endforeach
                            	</td>

                            </tr>
     					@endforeach
     				</tbody>
     			</table>
     		
    
@endsection