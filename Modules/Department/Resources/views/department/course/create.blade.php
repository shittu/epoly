@extends('department::layouts.master')
@section('title')
    department create new couse page
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
    <form class="login-form" action="{{route('department.course.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Couser Title</label>
            <input type="text" name="title" class="form-control" placeholder="course title">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Couser Code</label>
            <input type="text" name="code" class="form-control" placeholder="course code">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Couse Description if any</label>
            <textarea rows="5" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
        	<label>Level</label>
            <select name="level" class="form-control">
            	<option value=""></option>
            	@foreach(headOfDepartment()->levels() as $level)
                     <option value="{{$level->id}}">{{$level->name}}</option>
            	@endforeach
            </select>
            @error('level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Semester</label>
            <select name="semester" class="form-control">
            	<option value=""></option>
            	@foreach(headOfDepartment()->semesters as $semester)
                     <option value="{{$semester->id}}">{{$semester->name}}</option>
            	@endforeach
            </select>
            @error('semester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Register</button>
    </form>
</div>
@endsection