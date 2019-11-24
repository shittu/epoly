
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
    <a href="#">Graduation</a>
    <ul>
        <li>
            <a href="{{route('exam.officer.graduation.graduate.index')}}">Grduated Student</a>
        </li>
        <li>
            <a href="{{route('exam.officer.graduation.spill.index')}}">Spill Student</a>
        </li>
        <li>
            <a href="{{route('exam.officer.graduation.withdraw.index')}}">With Drawed Student</a>
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
    <a href="#">Results</a>
    <ul>
        <li>
            <a href="{{route('exam.officer.result.scoresheet.download.index')}}">
                Download Score Sheet
            </a>
        </li>
        <li>
            <a href="{{route('exam.officer.result.scoresheet.upload.index')}}">
                Upload Score Sheet
            </a>
        </li>
        <li>
            <a href="{{route('exam.officer.result.student.index')}}">Check Student Results</a>
        </li>
        <li>
            <a href="#">Results Statistics</a>
        </li>
        <li>
            <a href="{{route('exam.officer.result.course.index')}}">View Result</a>
        </li>
        <li>
            <a href="{{route('exam.officer.result.vetting.index')}}">AB Format</a>
        </li>
        <li>
            <a href="{{route('exam.officer.result.student.remark.index')}}">Remarks</a>
        </li>
    </ul>
</li>


