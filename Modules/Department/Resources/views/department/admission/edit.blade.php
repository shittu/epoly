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
        	<label>Admission No</label>
            <input type="text" name="admission_no" class="form-control" value="{{$admission->admission_no}}">
            @error('admission_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Student Type</label>
            <select name="student_type" class="form-control">
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
        <button class="button-fullwidth cws-button bt-color-3">Save Changes</button>
    </form><br><br>
</div>
@endsection