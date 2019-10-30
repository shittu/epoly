@if(lecturer())
	@foreach(lecturer()->lecturerCourses as $lecturer_course)
	    @if($lecturer_course->is_active == 1)
	    <option value="{{$lecturer_course->course->id}}">
	    	{{$lecturer_course->course->code}}
	    </option>
	    @endif
	@endforeach
@elseif(headOfDepartment())
    <optgroup label="My Courses">
	    @foreach(headOfDepartment()->staff->lecturer->lecturerCourses as $lecturer_course)
		    @if($lecturer_course->is_active == 1)
		    <option value="{{$lecturer_course->course->id}}">
		    	{{$lecturer_course->course->code}}
		    </option>
		    @endif
		@endforeach
    </optgroup>
    <optgroup label="Other Lecturers Courses">
    	@foreach(headOfDepartment()->department->courses as $course)
		    <option value="{{$course->id}}">
		    	{{$course->code}}
		    </option>
		@endforeach
    </optgroup>
@elseif(examOfficer())
    <optgroup label="My Courses">
	    @foreach(examOfficer()->lecturer->lecturerCourses as $lecturer_course)
		    @if($lecturer_course->is_active == 1)
		    <option value="{{$lecturer_course->course->id}}">
		    	{{$lecturer_course->course->code}}
		    </option>
		    @endif
		@endforeach
    </optgroup>
    <optgroup label="Other Lecturers Courses">
    	@foreach(examOfficer()->department->courses as $course)
		    <option value="{{$course->id}}">
		    	{{$course->code}}
		    </option>
		@endforeach
    </optgroup>
@endif