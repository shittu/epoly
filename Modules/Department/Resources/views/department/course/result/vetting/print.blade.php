@extends('layouts.result')

@section('page-content')
<div class="text text-center">
	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
	COLEEGE OF COLLEGE OF SCIENCE AND TECHNOLOGY<br>
	DEPARTMENT OF COMPUTER SCIENCE EXAMINATION RESULTS OF {{'2018/2019'}} SESSION<br><br>
	NATIONAL DIPLOMA IN COMPUTER SCIENCE II (MORNING)<br><br>
	NDSC II (M)
</div>
<div class="table-responsive table-condenced">
<table class="table table-bordered">
	<thead>
		<tr>
			<td>S/N</td>
			<td>NAME</td>
			<td>ADM NO</td>
			<td>COURSE CODE</td>
			<td>UNIT(S)</td>
			<td>GRADE</td>
			<td>POINT(S)</td>
			<td>GRADE POINT</td>
			<td>PREV UNIT</td>
			<td>CURR. SEM. UNITS</td>
			<td>C. UNITS</td>
			<td>G.P THIS SEM</td>
			<td>G.P AS AT LAST SEM</td>
			<td>C.G.P</td>
			<td>G.P.A THIS SEM</td>
			<td>C.G.P.A</td>
			<td>SEM. REMARKS</td>
			<td>GEN. REMARKS</td>
		</tr>
	</thead>
	<tbody>
	@foreach($registrations as $registration)
        @foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $registration)
        <tr>
        	<td>
        		{{$loop->parent->index+1}}
        	</td>
        	<td>
        		{{$registration->sessionRegistration->student->first_name}} {{$registration->sessionRegistration->student->last_name}}
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
        		{{$registration->previousUnits() ?? ' '}}
        	</td>
        	<td>
        		{{$registration->currentUnits() ?? ' '}}
        	</td>
        	<td>
        		{{$registration->cummulativeUnits() ?? ' '}}
        	</td>
        	<td>
        		{{number_format($registration->currentSemesterGradePoints(),2) ?? ' '}}
        	</td>
        	<td>
        		{{number_format($registration->gradePointAsAtLastSemester(),2) ?? ' '}}
        	</td>
        	<td>
        		{{number_format($registration->cummulativeGradePoints(),2) ?? ' '}}
        	</td>
        	<td>
        		{{number_format($registration->currentSemesterCummulativeGradePointsAverage(),2) ?? ' '}}
        	</td>
        	<td>
        		{{number_format($registration->cummulativeGradePointsAverage(),2) ?? ' '}}
        	</td>
        	<td>
        		@foreach($registration->courseRegistrations as $course_registration)
        		{{$course_registration->result->remark->name ?? ' '}}<br>
        		@endforeach
        	</td>
        	<td>
        		<!-- if all the courses of the session has been uploaded and failed all of them -->
        		@if($registration->sessionRegistration->allCoursesUploaded() && $registration->sessionRegistration->passedResults() == 0)
                     With draw
        		@else
        		<!-- check if the student passed all his courses of the session -->
            		@if($registration->sessionRegistration->allCoursesUploaded() && empty($registration->failedResults()))
                        Passed <br>
            		@else
            		<!-- check if the student has any course to repeat -->
                        @foreach($registration->failedResults() as $course)
                            Repeat {{$course->code}}<br>
                        @endforeach
            		@endif
            	@endif
            	<!-- check if the student has sessional EMC verdict -->
            	@foreach($registration->sessionRegistration->sessionRegistrationRemarks as $emc_remark)
                    {{'EMC Verdict'}} {{$emc_remark->remark->name}} <br>
            	@endforeach
            	<!-- check if the student has Semester EMC verdict -->
            	@foreach($registration->semesterRegistrationRemarks as $emc_remark)
                    {{'EMC Verdict'}} {{$emc_remark->remark->name}} <br>
            	@endforeach
        	</td>
        </tr>
        @endforeach
	@endforeach
    </tbody>
</table>
{{ $registrations->links() }}
</div>
@endsection