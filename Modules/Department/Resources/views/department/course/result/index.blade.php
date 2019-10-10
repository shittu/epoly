@extends('department::layouts.master')

@section('page-content')
<div class="col-md-3"></div>
    <div class="col-md-6"><br>
     	<div class="card">
     		<div class="card-header">
     			Course result specification 
     		</div>
     		<div class="card-body">
     			<form method="post" action="{{route('department.result.course.search')}}">
     				@csrf
	     			<select class="form-control" name='session'>
	     				<option value="">Session</option>
	     				@foreach(headOfDepartment()->staff->lecturer->sessions() as $session)
                            <option value="{{$session->id}}">{{$session->name}}</option>
	     				@endforeach
	     			</select>
	     			<br>
	     			<select class="form-control" name='course'>
	     				<option value="">Course</option>
	     				@foreach(headOfDepartment()->department->departmentCourses as $department_course)
                            <option value="{{$department_course->course->id}}">{{$department_course->course->code}}
                            </option>
	     				@endforeach
	     			</select>
                    <br>
	     			<button class="button-fullwidth cws-button bt-color-3 btn-block">View Result</button>
     			</form>
     		</div>
     	</div>
    </div>
@endsection