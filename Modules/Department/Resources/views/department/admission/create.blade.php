@extends('department::layouts.master')
@section('title')
    department create new admission page
@endsection
@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4"><br>
    <div class="row">
    	
    	<div class="col-md-12">
    		<h3>New Admission</h3>
    	</div>
    </div>
    
    <form class="login-form" action="{{route('department.admission.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Student Type</label>
            <select name="type" class="form-control">
            	<option value=""></option>
            	@foreach(headOfDepartment()->studentTypes() as $student_type)
                    <option value="{{$student_type->id}}">{{$student_type->name}}</option>
            	@endforeach
            </select>
            @error('student_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Student Session</label>
            <select name="session" class="form-control">
                <option value=""></option>
                @foreach(headOfDepartment()->studentSessions() as $student_session)
                    <option value="{{$student_session->id}}">{{$student_session->name}}</option>
                @endforeach
            </select>
            @error('student_session')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Register</button>
    </form><br><br>
</div>
@endsection