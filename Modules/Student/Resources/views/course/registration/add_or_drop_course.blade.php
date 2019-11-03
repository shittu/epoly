@extends('layouts.result')

@section('page-content')


	<form action="{{route('student.course.registration.courses.register')}}" method="post">
	    @csrf
		<div class="card">
			<div class="card-header text text-center">{{student()->level()}} {{currentSession()->name}} Session Courses Registered</div>
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
						@foreach($registrations as $registration)
							@foreach($registration->semesterRegistrations as $semester_registration)
								@foreach($semester_registration->courseRegistrations as $course_registration)
								<tr>
									<td>{{$loop->index+1}}</td>
									<td>{{$course_registration->course->title}}</td>
									<td>
										{{$course_registration->course->code}}
									</td>
									<td>
										{{$course_registration->course->unit}}
									</td>
									<td>
										{{$course_registration->course->semester->name}}
									</td>
									<td>
										{{$course_registration->course->currentCourseMaster() ??  'Not available'}}
									</td>
									<td>
										<input type="checkbox" checked="1" class="form-control" name="remove[]">
									</td>
								</tr>
								@endforeach
							@endforeach
						@endforeach
					</tbody>
				</table>	
			</div>
		</div>
		<br>
		<div class="card">
			<div class="card-header text text-center">{{student()->level()}} {{currentSession()->name}} Carry Over Courses</div>
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
						@foreach(student()->repeatCourseRegistrations->where('status',1) as $repeat)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$repeat->courseRegistration->course->title}}</td>
								<td>
									{{$repeat->courseRegistration->course->code}}
								</td>
								<td>
									{{$repeat->courseRegistration->course->unit}}
								</td>
								<td>
									{{$repeat->courseRegistration->course->semester->name}}
								</td>
								<td>
									{{$repeat->courseRegistration->course_registration->course->currentCourseMaster() ??  'Not available'}}
								</td>
								<td>
									<input type="checkbox" checked="1" class="form-control" name="add[]">  
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>	
			</div>
		</div><br>

	    <button class="btn-block button-fullwidth cws-button bt-color-3">Register</button>
	</form>

@endsection
