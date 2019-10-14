@extends('department::layouts.master')
@section('title')
    department edit admission page
@endsection
@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4"><br>
    <div class="row">
    	<div class="col-md-12">
    		<h3>Edit Admission</h3>
    	</div>
    </div>
    
    <form class="login-form" action="{{route('department.admission.update',[$admission->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{$admission->student->first_name}}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$admission->student->last_name}}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value=""></option>
                @foreach($admission->genders() as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Tribe</label>
            <select name="tribe" class="form-control">
                <option value=""></option>
                @foreach($admission->tribes() as $tribe)
                    <option value="{{$tribe->id}}">{{$tribe->name}}</option>
                @endforeach
            </select>
            @error('tribe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Religion</label>
            <select name="religion" class="form-control">
                <option value=""></option>
                @foreach($admission->religions() as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </select>
            @error('religion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{$admission->student->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Admission No</label>
            <input type="text" disabled="" name="admission_no" class="form-control" value="{{$admission->admission_no}}">
            @error('admission_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Student Type</label>
            <select name="type" class="form-control">
            	<option value="{{$admission->student->studentType->id}}">{{$admission->student->studentType->name}}</option>
            	@foreach(headOfDepartment()->studentTypes() as $student_type)
            	    @if($admission->student->studentType->id != $student_type->id)
                    <option value="{{$student_type->id}}">{{$student_type->name}}</option>
                    @endif
            	@endforeach
            </select>
            @error('student_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Student Type</label>
            <select name="session" class="form-control">
                <option value="{{$admission->student->studentSession->id}}">{{$admission->student->studentSession->name}}</option>
                @foreach(headOfDepartment()->studentSessions() as $student_session)
                    @if($admission->student->studentSession->id != $student_session->id)
                        <option value="{{$student_session->id}}">
                            {{$student_session->name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('student_session')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Save Changes</button>
    </form><br><br>
</div>
@endsection