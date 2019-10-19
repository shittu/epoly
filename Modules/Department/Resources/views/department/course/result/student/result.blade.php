@extends('department::layouts.master')

@section('page-content')
<div class="card">
	<div class="card-body table-responsive">
	    <div class="col-md-12 text-center"><br><br>
	    	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
	    	COLLEGE OF {{strtoupper($registration->student->admission->department->college->name)}}<br>
	    	DEPARTMENT OF {{strtoupper($registration->student->admission->department->name)}}<br>
	    	{{strtoupper($registration->semesterRegistrations->where('semester_id',request()->route('semester_id'))->first()->semester->name)}} EXAMINATION RESULTS, {{$registration->session->name}} SESSION<br><br>
	    	NATIONAL DIPLOMA IN COMPUTER SCIENCE II ({{$registration->student->studentSession->name}})<br><br>
	    	NDSC II ({{substr($registration->student->studentSession->name,0,1)}})
	    </div>
		<table class="table table-bordered table-striped" >
			<thead>
				<tr class="active">
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
                		{{$registration->previousUnits() > 0 ?? ' '}}
                	</td>

                	<td>
                		{{$registration->currentUnits() > 0 ?? ' '}}
                	</td>

                	<td>
                		{{$registration->currentSemesterGradePoints() > 0 ?? ' '}}
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
	</div>
</div>  
@endsection