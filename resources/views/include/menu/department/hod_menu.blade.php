<li>
    <a href="#">Lecturers</a>
</li>
<li>
    <a href="#">Admission</a>
    <ul>
        <li>
            <a href="{{route('department.admission.create')}}">New Admission</a>
        </li>
        <li>
            <a href="{{route('department.admission.index')}}">View Admission</a>
        </li>
    </ul>
</li>
<li>
    <a href="#">Courses</a>
    <ul>
        <li>
            <a href="{{route('department.course.create')}}">Register Course</a>
        </li>
        <li>
            <a href="#">Upload Courses</a>
        </li>
        
        <li>
            <a href="{{route('department.course.create')}}">View Courses</a>
        </li>
    </ul>
</li>
<li>
    <a href="{{route('department.course.allocation.index')}}">
    Course Allocation
    </a>
</li>
<li>
    <a href="#">Results</a>
    <ul>
        <li>
            <a href="#">Results Statistics</a>
        </li>
        <li>
            <a href="{{route('department.result.course.index')}}">View Result</a>
        </li>
        <li>
            <a href="{{route('department.result.course.bating.index')}}">Bating Result</a>
        </li>
        <li>
            <a href="">Remarks</a>
        </li>
    </ul>
</li>


