@extends('lecturer::layouts.master')

@section('page-content')

	<div class="card">
		<div class="card-body">
			<table class="table table-responsive">
				<thead>
					<tr>
						<td>S/N</td>
						<td>Course Title</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>Semester</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach(lecturer()->lecturerCourses as $lecture_course)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$lecture_course->course->title}}</td>
						<td>{{$lecture_course->course->code}}</td>
						<td>{{$lecture_course->course->unit}}</td>
						<td>{{$lecture_course->course->semester->name}}</td>
						<td>
							<button class="btn btn-info" style="color: white">Result Templete</button>
							<button class="btn btn-info" style="color: white">Uplaod Result</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
