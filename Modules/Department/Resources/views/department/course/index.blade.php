@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
	@if(count(headOfDepartment()->department->departmentCourses)>0)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Couse Title</th>
	     			<th>Course Code</th>
	     			<th>Description</th>
	     			<th>Semester</th>
	     			<th>Level</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(headOfDepartment()->department->departmentCourses as $departmentCourse)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$departmentCourse->course->title}}</td>
	     			<td>{{$departmentCourse->course->code}}</td>
	     			<td>{{$departmentCourse->course->description}}</td>
	     			<td>{{$departmentCourse->course->semester->name}}</td>
	     			<td>{{$departmentCourse->course->level->name}}</td>
	     			<td>
	     				<button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this staff')"><a href="{{route('department.course.delete',[$departmentCourse->course->id])}}" style="color: white">Delete</a> </i></button>
	     				<button class="btn btn-info"><a href="{{route('department.course.edit',['staff_id'=>$departmentCourse->course->id])}}" style="color: white">Edit</a></i></button>
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	@else
		<div class="alert alert-danger">No staff record found for this search</div>
	@endif   
@endsection