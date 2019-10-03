@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->sessionRegistrations as $session_registration)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$session_registration->level->name}} Registered Courses</div>
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Course Title</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>Level</td>
						<td>Semester</td>
					</tr>
				</head>
				<tbody>
					@foreach($session_registration->sessionCourseRegistrations as $course_registration)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$course_registration->course->title}}</td>
						<td>
							{{$course_registration->course->code}}
						</td>
						<td>
							{{$course_registration->course->code}}
						</td>
						<td>
							{{$course_registration->sessionRegistration->level->name}}
						</td>
						<td>
							{{$course_registration->course->semester->name}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
	</div><br>
	@endforeach
</div> 
@endsection
