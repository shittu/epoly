@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->sessionRegistrations as $session_registration)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$session_registration->level->name}} Courses Result</div>
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>CA Score</td>
						<td>Exam Score</td>
						<td>Total Score</td>
						<td>Grade</td>
						<td>Points</td>
						<td>Remark</td>
					</tr>
				</head>
				<tbody>
					@php
                        if(!isset($point)){
						    $point = 0;
						}
					@endphp
					@foreach($session_registration->sessionCourseRegistrations as $course_registration)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$course_registration->course->code}}</td>
						<td>{{$course_registration->course->unit}}</td>
						<td>
							{{$course_registration->result->ca}}
						</td>
						<td>
							{{$course_registration->result->exam}}
						</td>
						<td>
							
							   {{$course_registration->result->accessment() + $course_registration->result->examination()}}
						    				
						</td>
						<td>
							{{$course_registration->result->grade}}
						</td>
						<td>
							{{$course_registration->result->points}}
						</td>
						<td>
							{{$course_registration->result->remark ? $course_registration->result->remark->name : ' '}}
						</td>
					</tr>
					
					@endforeach
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><b>Grant Points</b></td>
                    	<td><b>{{$session_registration->sessionGrandPoints()}}</b></td>
                    </tr>
				</tbody>
			</table>	
		</div>
	</div><br>
	@endforeach
</div> 
@endsection
