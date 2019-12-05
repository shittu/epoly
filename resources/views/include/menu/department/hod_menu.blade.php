<li>
    <a href="#">Staffs</a>
    <ul>
        <li>
            <a href="{{route('department.lecturer.index')}}">Lecturers</a>
        </li>
        <li>
            <a href="{{route('department.exam.officer.index')}}">Exam Officers</a>
        </li>
    </ul>
</li>
<li>
    <a href="#">Admission</a>
    <ul>
        <li>
            <a href="{{route('department.admission.create')}}">New Admission</a>
        </li>
        <li>
            <a href="{{route('department.admission.index')}}">View Student Detail</a>
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
            <a href="{{route('department.results.scoresheet.download.index')}}">Download Score Sheet</a>
        </li>

        <li>
            <a href="{{route('department.results.scoresheet.upload.index')}}">Upload Score Sheet</a>
        </li>

        <li>
            <a href="{{route('department.student.result.index')}}">Check Student Results</a>
        </li>

        <li>
            <a href="#">Results Statistics</a>
        </li>

        <li>
            <a href="{{route('department.result.course.index')}}">View Result</a>
        </li>
        <li>
            <a href="{{route('department.result.course.vetting.index')}}">AB Format</a>
        </li>

        <li>
            <a href="{{route('department.result.remark.index')}}">Remarks</a>
        </li>
    </ul>
</li>
<li>
    <a href="#">Applications</a>
    <!-- sub menu -->
    <ul>
        <li><a href="{{route('department.diferring.index')}}">Diferring</a></li>
    </ul>
    <!-- / sub menu -->
</li>


