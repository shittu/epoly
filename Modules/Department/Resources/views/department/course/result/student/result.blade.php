@extends('layouts.result')

@section('page-content')
	<div class="table-responsive">
	    <div class="col-md-12 text-center"><br><br>
	    	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
	    	COLLEGE OF {{strtoupper($registration->student->admission->department->college->name)}}<br>
	    	DEPARTMENT OF {{strtoupper($registration->student->admission->department->name)}}<br>
	    	{{strtoupper($registration->semesterRegistrations->where('semester_id',request()->route('semester_id'))->first()->semester->name)}} EXAMINATION RESULTS, {{$registration->session->name}} SESSION<br><br>
	    	NATIONAL DIPLOMA IN COMPUTER SCIENCE II ({{$registration->student->studentSession->name}})<br><br>
	    	NDCS II ({{substr($registration->student->studentSession->name,0,1)}})
	    </div>
		<table class="table table-bordered table-striped" >
			<thead>
				<tr class="active">
					<td>NAME</td>
					<td>ADM NO</td>
					<td>COURSE CODE</td>
					<td>UNIT(S)</td>
					<td>GRADE</td>
					<td>POINT(S)</td>
					<td>GRADE POINT</td>
					<td>PREV UNIT</td>
					<td>CURR. SEM. UNITS</td>
					<td>CUMM UNITS</td>
					<td>G.P THIS SEM</td>
					<td>G.P AS AT LAST SEM</td>
					<td>CUMM.G.P</td>
					<td>G.P.A THIS SEM</td>
					<td>C.G.P.A</td>
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
                		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
                		{{$course_registration->result->remark->name ?? ' '}}<br>
                		@endforeach
                	</td>
                	<td>
                        {{$registration->generalRemarks()['remark']}}<br>
                        @foreach($registration->generalRemarks()['conditions'] as $condition)
                            {{$condition}}<br>
                        @endforeach
                	</td>
                </tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection