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
						<td>Name</td>
						<td>Admission No</td>
						<td>Email</td>
						<td>Phone</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@if(!empty($student_courses))
						@foreach($student_courses as $student_course)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td>
								{{$student_course->student->first_name}} {{$student_course->student->last_name}}
							</td>
							<td>
								{{$student_course->student->admission->admission_no}}
							</td>
							<td>
								{{$student_course->student->email}}
							</td>
							<td>
								{{$student_course->student->phone}}
							</td>
							<td>
								<button class="btn btn-info" data-toggle="">Remark</button>
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div> 
@endsection
