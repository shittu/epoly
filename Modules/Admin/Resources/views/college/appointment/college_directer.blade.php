@extends('admin::layouts.master')
@section('title')
    college directer appointment create page
@endsection
@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <br><br>
    <div class="row">
    	<div class="col-md-4"></div>
    	<div class="col-md-4">
    		<img src="{{asset('img/logo.png')}}">
    	</div>
    </div>
    <br><br>
    <form class="login-form" action="{{route('admin.college.appointment.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>New Directer Staff ID</label>
            <input type="text" name="staffID" class="form-control" placeholder="Staff ID">
            @error('staffID')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Appointment Date</label>
            <input type="date" name="appointment_date" class="form-control" placeholder="college name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Create Appointment</button>
    </form>
</div>
@endsection