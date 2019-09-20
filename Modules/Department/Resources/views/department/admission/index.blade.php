@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
	@if(count(headOfDepartment()->admissions)>0)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Fisrt Name</th>
	     			<th>Last Name</th>
	     			<th>Admission No</th>
	     			<th>E-mail</th>
	     			<th>Phone</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(headOfDepartment()->admissions as $admission)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$admission->student->first_name}}</td>
	     			<td>{{$admission->student->last_name}}</td>
	     			<td>{{$admission->admission_no}}</td>
	     			<td>{{$admission->student->email}}</td>
	     			<td>{{$admission->student->phone}}</td>
	     			<td>
	     				<button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this course from the list of courses in this department')"><a href="{{route('department.admission.delete',['admission_id'=>$admission->id])}}" style="color: white">Delete</a> </i></button>
	     				<button class="btn btn-info"><a href="{{route('department.admission.edit',['admission_id'=>$admission->id])}}" style="color: white">Edit</a></i></button>
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	@else
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="alert alert-danger">No admission record found for this department</div>
	</div>
	@endif   
@endsection