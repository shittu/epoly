@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{student()->level()}} {{date('Y')}} / {{date('Y')+1}} Registered Courses</div>
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Course Title</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>Semester</td>
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
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
	</div>
</div> 
@endsection
