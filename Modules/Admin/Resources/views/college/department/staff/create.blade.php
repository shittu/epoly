@extends('admin::layouts.master')
@section('title')
    admin create college page
@endsection
@section('page-content')

<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card">
    	<div class="card-body">
		    <div class="row">
		    	<div class="col-md-5"></div>
		    	<div class="col-md-4">
		    		<img src="{{asset('img/logo.png')}}">
		    	</div>
		    </div>
		    <br><br>
		    <form class="login-form" action="{{route('admin.college.department.staff.register')}}" method="post">
		        @csrf
		        <div class="form-group">
		        	<label>Staff First Name</label>
		            <input type="text" name="first_name" class="form-control" placeholder="college name">
		            @error('first_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Last Name</label>
		            <input type="text" name="last_name" class="form-control" placeholder="staff last name">
		            @error('last_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Gender</label>
		            <select class="form-control" name="gender">
		            	<option></option>
		            </select>
		            @error('gender')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Religion</label>
		            <select class="form-control" name="religion">
		            	<option></option>
		            </select>
		            @error('religion')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Tribe</label>
		            <select class="form-control" name="tribe">
		            	<option></option>
		            </select>
		            @error('tribe')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Department</label>
		            <select class="form-control" name="department">
		            	<option></option>
		            </select>
		            @error('department')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Category</label>
		            <select class="form-control" name="category">
		            	<option></option>
		            </select>
		            @error('department')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff ID</label>
		            <input type="text" name="staffID" class="form-control" placeholder="staff ID">
		            @error('staffID')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Phone Number</label>
		            <input type="text" name="phone" class="form-control" placeholder="college name">
		            @error('phone')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff E-mail Address</label>
		            <input type="email" name="email" class="form-control" placeholder="staff E-mail">
		            @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Home Address</label>
		            <textarea rows="3" name="address" class="form-control"></textarea>
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Register</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection