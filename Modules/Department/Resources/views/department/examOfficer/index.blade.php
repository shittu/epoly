@extends('department::layouts.master')

@section('title')
    Available Exam Officers in {{headOfDepartment()->department->name}} Department
@endsection

@section('page-content')
	@if($examOfficers)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Name</th>
	     			<th>Email</th>
	     			<th>Phone</th>
	     			<th>Employed at</th>
	     			<th>Year Since Appointment</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach($examOfficers as $examOfficer)
		     		<tr>
		     			<td>{{$loop->index+1}}</td>
		     			<td>{{$examOfficer->lecturer->staff->first_name.' '.$examOfficer->lecturer->staff->last_name}}</td>
		     			<td>{{$examOfficer->lecturer->staff->email}}</td>
		     			<td>{{$examOfficer->lecturer->staff->phone}}</td>
		     			<td>{{$examOfficer->from}}</td>
		     			<td>{{$examOfficer->duration()}}</td>
		     			<td>
		     				<a href="#">
		     					<button class="btn btn-primary">
			     					Revoke Exam Officer
			     				</button>
		     				</a>
		     			</td>
		     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	@else
		<div class="alert alert-danger">
			No Exam Officers record available in {{headOfDepartment()->department->name}} Department
		</div>
	@endif   
@endsection