@extends('department::layouts.master')

@section('page-content')
<div class="col-md-3"></div>
    <div class="col-md-6"><br>
     	<div class="card">
     		<div class="card-body">
     			<form action="{{route('department.result.course.bating.search')}}" method="post">
     				@csrf
     				<select class="form-control" name="session">
     					<option value="">Session</option>
     					@foreach(headOfDepartment()->sessions() as $session)
     					    <option value="{{$session->id}}">{{$session->name}}</option>
     					@endforeach    
     				</select><br>
     				<select class="form-control" name="level">
     					<option value="">Level</option>
     					@foreach(headOfDepartment()->levels() as $level)
     					    <option value="{{$level->id}}">{{$level->name}}</option>
     					@endforeach
     				</select><br>
     				<select class="form-control" name="semester">
     					<option value="">Semester</option>
     					<option value="1">First Semester</option>
     					<option value="2">Second Semester</option>
     				</select><br>
     				<label>Student/Page</label>
     				<input type="number" name="paginate" class="form-control"><br>
     				<button class="button-fullwidth cws-button bt-color-3 btn-block">Search Result</button>
     			</form>
     		</div>
     	</div>
    </div>
@endsection