@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->studentType->levels as $level)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$level->name}} Courses Result</div>
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
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
					@php
                        if(!isset($point)){
						    $point = 0;
						}
					@endphp
					@foreach(student()->studentCourses()->where('level_id',$level->id)->get() as $student_course)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$student_course->course->code}}</td>
						<td>
							{{$student_course->result->ca}}
						</td>
						<td>
							{{$student_course->result->exam}}
						</td>
						<td>
							@if($student_course->result->points != '--')
							   {{$student_course->result->ca + $student_course->result->exam}}
						    @endif					
						</td>
						<td>
							{{$student_course->result->grade}}
						</td>
						<td>
							{{$student_course->result->points}}
						</td>
						<td>
							{{$student_course->result->remark}}
						</td>
					</tr>
					@php
					    if($student_course->result->points != '--'){
                            $point += $student_course->result->points;
					    }
					@endphp
					@endforeach
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><b>Grant Points</b></td>
                    	<td><b>{{$point > 0 ? $point : 0.00}}</b></td>
                    </tr>
				</tbody>
			</table>	
		</div>
	</div><br>
	@endforeach
</div> 
@endsection
