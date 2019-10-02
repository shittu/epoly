@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->studentType->levels as $level)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$level->name}} Registered Courses</div>
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
					@foreach(student()->studentCourses()->where('level_id',$level->id)->get() as $student_course)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$student_course->course->title}}</td>
						<td>
							{{$student_course->course->code}}
						</td>
						<td>
							{{$student_course->course->code}}
						</td>
						<td>
							{{$student_course->level->name}}
						</td>
						<td>
							{{$student_course->course->semester->name}}
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
