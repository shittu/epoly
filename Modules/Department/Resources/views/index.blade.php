@extends('department::layouts.master')

@section('page-content')
    @foreach(headOfDepartment()->department->unverifiedResults() as $result)
        <div class="col-md-4">
         	<div class="card">
         		<div class="card-header bt-color-3">
         			{{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
         		</div>
         		<div class="card-body">
         			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block">Review This Result</button>
     			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block">Edit This Result</button>
			         			
         		</div>
         	</div>
        </div>
    @endforeach
@endsection