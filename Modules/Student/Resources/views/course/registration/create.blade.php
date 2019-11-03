@extends('student::layouts.master')

@section('page-content')
	<form action="{{route('student.course.registration.courses.register')}}" method="post">
	    @csrf
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">{{student()->level()}} {{currentSession()->name}} Session Courses</div>
			<div class="card-body">
				<table class="table">
					<head>
						<tr>
							<td>S/N</td>
							<td>Course Title</td>
							<td>Course Code</td>
							<td>Course Unit</td>
							<td>Semester</td>
							<td>lecturer</td>
							<td></td>
						</tr>
					</head>
					<tbody>
						@foreach($courses as $course)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td>{{$course->title}}</td>
							<td>
								{{$course->code}}
							</td>
							<td>
								{{$course->unit}}
							</td>
							<td>
								{{$course->semester->name}}
							</td>
							<td>
								{{$course->currentCourseMaster() ? $course->currentCourseMaster()->staff->first_name.' '.$course->currentCourseMaster()->staff->last_name : 'Not available'}}
							</td>
							<td>
								<input type="checkbox" name="course[]" value="{{$course->id}}" style="visibility: show" checked class="form-control">  
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>	
			</div>
		</div>
		<br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">{{student()->level()}} {{currentSession()->name}} Carry Over Courses</div>
			<div class="card-body">
				
			</div>
		</div><br>

	    <button class="btn-block button-fullwidth cws-button bt-color-3">Register</button>
	</form>
@endsection
