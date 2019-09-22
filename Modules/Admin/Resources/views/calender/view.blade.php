@extends('admin::layouts.master')
@section('title')
    admin create calender page
@endsection
@section('page-content')

<div class="col-md-3">
</div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">
		    {{$session->name}} Session Calender 
	    </div>
		<div class="card-body">
			<table>
				<tr>
					<td>Session Start Date</td>
					<td>{{$session->start}}</td>
				</tr>
				<tr>
					<td>Session End Date</td>
					<td>{{$session->end}}</td>
				</tr>
				<tr>
					<td>Session Count Down</td>
					<td>{{$session->countDown()}}</td>
				</tr>
			</table>
		</div>
	</div><br>
	@foreach($session->calenders as $calender)
	    <div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Start Date</td>
						<td>{{$calender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} End Date</td>
						<td>{{$calender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Count Down</td>
						<td>{{$calender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<!-- lecturer course allocation -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Lecturer Course Allocation Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Course Allocation Start Date</td>
						<td>{{$calender->courseAllocationCalender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Course Allocation End Date</td>
						<td>{{$calender->courseAllocationCalender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Course Allocation Count Down</td>
						<td>{{$calender->courseAllocationCalender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
	@endforeach
</div>
@endsection