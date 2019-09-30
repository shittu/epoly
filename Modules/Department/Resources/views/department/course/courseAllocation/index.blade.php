@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
	@foreach(headOfDepartment()->department->courses as $course)
    	<div class="card">
        	<div class="card-body">
        		<form>
        			<label>Course Title</label>
        			<select class="form-control">
        				<option value="{{$course->id}}">{{$course->title}}</option>
        			</select>
        			<label>Course Code</label>
        			<select class="form-control">
        				<option value="{{$course->id}}">{{$course->code}}</option>
        			</select>
        			<label>Department</label>
        			<select class="form-control">
        				<option value="{{$course->department->id}}">{{$course->department->name}}</option>
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