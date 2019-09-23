@extends('admin::layouts.master')
@section('title')
    admin view calender page
@endsection
@section('page-content')
<div class="col-md-3">
</div>
<div class="col-md-6">
	@if(admin())
	<button class="card-header button-fullwidth cws-button bt-color-3"><a href="{{route('admin.calender.edit',[$session->id])}}" style="color: white">{{$session->name}} Edit Calender</a></button>
    <button class="card-header button-fullwidth cws-button bt-color-3"><a href="{{route('admin.calender.delete',[$session->id])}}" style="color: white" onclick="confirm('Are you sure you want to delete this school calender')">{{$session->name}} Delete Calender</a></button><br>
    @endif
    <br>
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
		<!-- lecture calender -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Lecture  Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Lecture Start Date</td>
						<td>{{$calender->lectureCalender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Lecture End Date</td>
						<td>{{$calender->lectureCalender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Lecture Count Down</td>
						<td>{{$calender->lectureCalender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>

		<!-- examination calender -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Examination  Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Examination Start Date</td>
						<td>{{$calender->examCalender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Examination End Date</td>
						<td>{{$calender->examCalender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Examination Count Down</td>
						<td>{{$calender->examCalender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>

		<!-- exam marking calender -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Exam Marking  Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Exam Marking Start Date</td>
						<td>{{$calender->markingCalender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Exam Marking End Date</td>
						<td>{{$calender->markingCalender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Exam Marking Count Down</td>
						<td>{{$calender->markingCalender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<!-- result upload calender -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$calender->semester->name}} Result Upload  Calender 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$calender->semester->name}} Result Upload Start Date</td>
						<td>{{$calender->uploadResultCalender->start}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Result Upload End Date</td>
						<td>{{$calender->uploadResultCalender->end}}</td>
					</tr>
					<tr>
						<td>{{$calender->semester->name}} Result Upload Count Down</td>
						<td>{{$calender->uploadResultCalender->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
	@endforeach
</div>
@endsection