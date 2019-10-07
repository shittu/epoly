@extends('lecturer::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="card">
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Name</td>
						<td>Admission No</td>
						<td>Course Code</td>
						<td>CA Score</td>
						<td>Exam Score</td>
						<td>Total Score</td>
						<td>Grade</td>
						<td>Points</td>
						<td>Remark</td>
					</tr>
				</head>
				<tbody>
					@foreach(session('results') as $result)
					<tr>
						<td>
							{{$loop->index+1}}
						</td>
						<td>
							{{$result->sessionCourseRegistration->sessionRegistration->student->first_name}} {{$result->sessionCourseRegistration->sessionRegistration->student->last_name}}
						</td>
						<td>
							{{$result->sessionCourseRegistration->sessionRegistration->student->admission->admission_no}}
						</td>
						<td>
							{{$result->sessionCourseRegistration->course->code}}
						</td>
						<td>
							{{$result->ca}}
						</td>
						<td>
							{{$result->exam}}
						</td>
						<td>
							@if($result->ca != '--'||$result->exam != '--')
							   {{$result->ca + $result->exam}}
						    @endif					
						</td>
						<td>
							{{$result->grade}}
						</td>
						<td>
							{{$result->points}}
						</td>
						<td>
							{{$result->remark ? $result->remark->name : ' '}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
	</div><br>
	
</div> 
@endsection
