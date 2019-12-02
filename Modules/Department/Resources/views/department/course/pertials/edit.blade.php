<div class="col-md-3"></div>
<div class="col-md-6"><br>
    <div class="row">
    	
    	<div class="col-md-12">
    		<h3>Edit Course</h3>
    	</div>
    </div>
    
    <form class="login-form" action="{{route('department.course.update',['course_id'=>$course->id])}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Couser Title</label>
            <input type="text" name="title" class="form-control" value="{{$course->title}}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Couser Code</label>
            <input type="text" name="code" class="form-control" value="{{$course->code}}">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Couse Unit</label>
            <select name="unit" class="form-control">
                <option value="{{$course->unit}}">{{$course->unit}}</option>
                @foreach([1,2,3,4,5,6] as $unit)
                    @if($course->unit != $unit)
                        <option value="{{$unit}}">{{$unit}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
        	<label>Level</label>
            <select name="level" class="form-control">
            	<option value="{{$course->level->id}}">{{$course->level->name}}</option>
            	@foreach(headOfDepartment()->levels() as $level)
            	    @if($course->level->id != $level->id)
                        <option value="{{$level->id}}">
                        	{{$level->name}}
                        </option>
                    @endif 
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
            	<option value="{{$course->semester->id}}">{{$course->semester->name}}</option>
            	@foreach(headOfDepartment()->semesters() as $semester)
            	    @if($course->semester->id != $semester->id)
	                    <option value="{{$semester->id}}">
	                    	{{$semester->name}}
	                    </option>
                    @endif
            	@endforeach
            </select>
            @error('semester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Save Changes</button>
    </form><br><br>
</div>