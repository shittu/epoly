<div class="card">
	<div class="card-header text text-center">{{student()->level()->name}} {{currentSession()->name}} Carry Over Courses</div>
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
				@foreach(student()->repeatCourses->where('status',1) as $repeat)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$repeat->course->title}}</td>
						<td>
							{{$repeat->course->code}}
						</td>
						<td>
							{{$repeat->course->unit}}
						</td>
						<td>
							{{$repeat->course->semester->name}}
						</td>
						<td>
							{{$repeat->course->currentCourseMaster() ??  'Not available'}}
						</td>
						<td>
							<input type="checkbox" value="{{$repeat->id}}" class="form-control" name="add[]">  
						</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="strong h4">Total Units</td>
					<td class="strong h4">{{student()->currentSessionCarryOverCourseUnits()}}</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>