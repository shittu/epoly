@foreach(lecturer()->lecturerCourses as $lecturer_course)
    @if($lecturer_course->is_active == 1)
    <option value="{{$lecturer_course->course->id}}">
    	{{$lecturer_course->course->code}}
    </option>
    @endif
@endforeach