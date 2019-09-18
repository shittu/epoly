@extends('admin::layouts.master')

@section('title')
    search available appointment staffs
@endsection

@section('page-content')
	@if(count(session('staffs'))>0)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Name</th>
	     			<th>Email</th>
	     			<th>Phone</th>
	     			<th>College</th>
	     			<th>Department</th>
	     			<th>Appointment</th>
	     			<th>Appointment Status</th>
	     			<th>Duration</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(session('staffs') as $staff)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$staff->first_name.' '.$staff->last_name}}</td>
	     			<td>{{$staff->email}}</td>
	     			<td>{{$staff->phone}}</td>
	     			<td>{{$staff->department->college->name}}</td>
	     			<td>{{$staff->department->name}}</td>
	     			<td>
	     				@if($staff->headOfDepartment)
                            {{'Head Of Department'}}
	     				@elseif($staff->directer)
	     				    {{'College Directer'}}
	     				@else
	     				    {{'Un Define'}}    
	     				@endif
	     			</td>
	     			<td>
	     				@if($staff->headOfDepartment)
                            {{$staff->headOfDepartment->is_active == 1 ? 'Active' : 'Not Active' }}
	     				@elseif($staff->directer)
	     				    {{$staff->directer->is_active == 1 ? 'Active' : 'Not Active' }}
	     				@else
	     				    {{'Un Define'}}    
	     				@endif
	     			</td>
	     			<td>
	     				@if($staff->headOfDepartment)
                            {{$staff->headOfDepartment->duration()}}
	     				@elseif($staff->directer)
	     				    {{$staff->directer->duration()}}
	     				@else
	     				        
	     				@endif
	     			</td>
	     			<td>
	     				@if($staff->staffCategory->id == 1)
		     				@if($staff->headOfDepartment || $staff->directer)
		     				<!-- if staff is appinted -->
		     				<button class="btn btn-primary"><a href="{{route('admin.college.department.staff.show',['staff_id'=>$staff->id])}}" style="color: white">Revoke Appointmnet</a></i>
		     				</button><br>

		     				<!-- edit appointment -->
		     				<button class="btn btn-info"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Edit Appointment</a></i>
		     				</button><br>
	                        
	                        <!-- delete appointment -->
		     				<button class="btn btn-info"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Delete Appointment</a></i>
		     				</button><br>
	                        @else
	                        <!-- if the staff is not appinted to hod -->
		     				<button class="btn btn-info" onclick="confirm('Are you sure you want appoint this staff as Head of department')"><a href="{{route('admin.college.department.staff.delete',[$staff->id])}}" style="color: white">Appointed To HOD</a> </i>
		     				</button><br>

	                        <!-- if the staff is not appointed to directer -->
		     				<button class="btn btn-info"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Appointed To Directer</a></i></button>
	                        @endif
	                    @endif
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	@else
		<div class="alert alert-danger">No staff record found for this search</div>
	@endif   
@endsection