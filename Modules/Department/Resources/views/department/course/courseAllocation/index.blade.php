@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
	@foreach(headOfDepartment()->department->departmentCourses as $department_course)
    	<div class="card">
        	<div class="card-body">
        		<form>
        			<label>Course Title</label>
        			<select class="form-control">
        				<option value="{{$department_course->course->id}}">{{$department_course->course->title}}</option>
        			</select>
        			<label>Course Code</label>
        			<select class="form-control">
        				<option value="{{$department_course->course->id}}">{{$department_course->course->code}}</option>
        			</select>
        			<label>Department</label>
        			<select class="form-control">
        				<option value="{{$department_course->department->id}}">{{$department_course->department->name}}</option>
        			</select>
        			<label>Course Master</label>
        			<select class="form-control">
        				<option value="">Lecturer</option>
        				@foreach(headOfDepartment()->department->staffs as $staff)
                            @if($staff->staffType->name == 'Lecturer')
                                <option value="{{$staff->id}}">{{$staff->first_name}} {{$staff->first_name}} {{$staff->staffID}}</option>
                            @endif
        				@endforeach
        			</select>
        			<label>Course Assistance</label>
        			<select class="form-control">
        				<option value="">Lecturer</option>
        				@foreach(headOfDepartment()->department->staffs as $staff)
                            @if($staff->staffType->name == 'Lecturer')
                                <option value="{{$staff->id}}">{{$staff->first_name}} {{$staff->first_name}} {{$staff->staffID}}</option>
                            @endif
        				@endforeach
        			</select>
        		</form>
        	</div>
        </div><br>
	@endforeach
	</div> 
@endsection