@extends('department::layouts.master')

@section('page-content')
    <div class="col-md-12"><br>
     	<div class="card">
     		<div class="card-body">
     			<table class="table">
     				<thead>
     					<tr>
     						<td>S/N</td>
     						<td>Name</td>
     						<td>ADMISSION NO</td>
     						<td>COURSES</td>
     						<td>UNITS</td>
     						<td>GRADES</td>
     						<td>POINTS</td>
     						<td>GP</td>
     						<td>REMARKS</td>
     					</tr>
     				</thead>
     				<tbody>
     					@foreach($registrations as $registration)
                            <tr>
                            	<td>
                            		{{$loop->index+1}}
                            	</td>
                            	<td>
                            		{{$registration->student->first_name}} {{$registration->student->last_name}}
                            	</td>
                            	<td>
                            		{{$registration->student->admission->admission_no}}
                            	</td>
                            	<td>
                            		@foreach($registration->sessionCourseRegistrations as $course_registration)

                            		{{$course_registration->course->code}}<br>
                            		
                            		@endforeach
                            	</td>
                            	<td>
                            		@foreach($registration->sessionCourseRegistrations as $course_registration)

                            		{{$course_registration->course->unit}}<br>
                            		
                            		@endforeach
                            	</td>
                            	<td>
                            		@foreach($registration->sessionCourseRegistrations as $course_registration)

                            		{{$course_registration->result->grade}}<br>
                            		
                            		@endforeach
                            	</td>
                            	<td>
                            		@foreach($registration->sessionCourseRegistrations as $course_registration)

                            		{{$course_registration->result->points}}<br>
                            		
                            		@endforeach
                            	</td>
                            	<td>{{$registration->sessionGrandPoints()}}</td>
                            	<td>
                            		@if(empty($registration->failedResults()))
                                        Pass <br>
                            		@elseif($registration->passedResults() == 0)
                                        Fail <br>
                            		@else
                                        @foreach($registration->failedResults() as $course)
                                            Repeat {{$course->code}}<br>
                                        @endforeach
                            		@endif
                            		
                            	</td>
                            	
                            </tr>
     					@endforeach
     				</tbody>
     			</table>
     		</div>
     	</div>
    </div>
@endsection