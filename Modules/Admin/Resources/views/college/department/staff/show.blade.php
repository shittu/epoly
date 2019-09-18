@extends('admin::layouts.master')

@section('title')
    staff registration success page
@endsection

@section('page-content')
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">image here</div>
					<div class="col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2>Biodata</h2>
	    				<table>
	    					<tr>
	    						<td>Name</td>
	    						<td>{{$staff->first_name.' '.$staff->last_name}}</td>
	    					</tr>
	    					<tr>
	    						<td>E-mail</td>
	    						<td>{{$staff->email}}</td>
	    					</tr>
	    					<tr>
	    						<td>Staff ID</td>
	    						<td>{{$staff->staffID}}</td>
	    					</tr>
	    					<tr>
	    						<td>Gender</td>
	    						<td>{{$staff->profile->gender->name}}</td>
	    					</tr>
	    					<tr>
	    						<td>Religion</td>
	    						<td>{{$staff->profile->religion->name}}</td>
	    					</tr>
	    					<tr>
	    						<td>Tribe</td>
	    						<td>{{$staff->profile->tribe->name}}</td>
	    					</tr>
	    				</table>
					</div>
					<div class="col-md-6">
						<h2>Qualification</h2>
	    				<table>
	    					<tr>
	    						<td></td>
	    						<td></td>
	    					</tr>
	    				</table>
					</div>
					<div class="col-md-6">
						<h2>Appointments</h2>
	    				<table>
	    					@if($staff->headOfDepartment)
	    					<tr>
	    						<td>Position</td>
	    						<td>Head Of Department</td>
	    					</tr>
	    					<tr>
	    						<td>Department</td>
	    						<td>{{$staff->headOfDepartment->department->name}}</td>
	    					</tr>
	    					<tr>
	    						<td>From</td>
	    						<td>{{$staff->headOfDepartment->from}}</td>
	    					</tr>
	    					<tr>
	    						<td>To</td>
	    						<td>{{$staff->headOfDepartment->to}}</td>
	    					</tr>
	    					@endif
	    					@if($staff->directer)
	    					<tr>
	    						<td>Position</td>
	    						<td>College Directer</td>
	    					</tr>
	    					<tr>
	    						<td>College</td>
	    						<td>{{$staff->directer->college->name}}</td>
	    					</tr>
	    					<tr>
	    						<td>From</td>
	    						<td>{{$staff->directer->from}}</td>
	    					</tr>
	    					<tr>
	    						<td>To</td>
	    						<td>{{$staff->directer->to}}</td>
	    					</tr>
	    					@endif
	    				</table>
					</div>
					<div class="col-md-6">
						<h2>Promotions</h2>
	    				<table>
	    					<tr>
	    						<td></td>
	    						<td></td>
	    					</tr>
	    				</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection