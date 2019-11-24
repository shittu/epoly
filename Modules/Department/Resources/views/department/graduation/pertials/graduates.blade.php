@if(count($graduates)> 0)
<div class="col-md-12">
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table">
			    <thead>
			     	<tr>
			     		<td>S/N</td>
			     		<td>First Name</td>
			     		<td>Last Name</td>
			     		<td>Admission No</td>
			     		<td>Phone</td>
			     		<td>Student</td>
			     		<td>CGPA</td>
			     	</tr>
			    </thead>
			    <tbody>
			    	@foreach($graduates as $graduate)
		            <tr>
			     		<td>{{$loop->index+1}}</td>
			     		<td>{{$graduate->first_name}}</td>
			     		<td>{{$graduate->last_name}}</td>
			     		<td>{{$graduate->admission->admission_no}}</td>
			     		<td>{{$graduate->phone}}</td>
			     		<td>{{$graduate->studentType->name}}</td>
			     		<td>{{$graduate->cummulativeGradePointAverage()}}</td>
			     	</tr>
			    	@endforeach
			    </tbody>
		    </table>
		</div>
	</div>
</div>
</div>
@else
<div class="col-md-12">
	<div class="alert alert-danger">Sorry there is no graduates fount at {{$session->name}} Session</div>
</div>
@endif
