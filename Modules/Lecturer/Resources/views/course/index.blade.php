@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-1"></div> 
<div class="col-md-10">
	<div class="card">
		<div class="card-body">
			<table class="table table-default">
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
							<form action="{{route('lecturer.result.templete.download')}}" method="post">
								@csrf
								<input type="hidden" name="course_id" value="{{$lecture_course->course->id}}">
								<button class="btn btn-info" style="color: white"><i class="fa fa-download"></i>Result Templete</button>
							</form>

							<button data-toggle="modal" data-target="#result_{{$lecture_course->course->id}}" class="btn btn-info" style="color: white">
								<i class="fa fa-upload"></i>Uplaod Result
							</button>
							@include('lecturer::course.upload')
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> 
@endsection
