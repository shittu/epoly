<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Modules\Department\Entities\Semester;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;
use Modules\Department\Services\Graduation\HasGraduatedStudent;
use Modules\Admission\Services\Traits\AdmissionNumberGenerator;

class Department extends BaseModel
{
    use AdmissionNumberGenerator, HasGraduatedStudent;

    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }
    
    public function departmentalAppointments()
    {
        return $this->hasMany(DepartmentalAppointment::class);
    }

    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
    }

    public function examOfficers()
    {
        return $this->hasMany('Modules\ExamOfficer\Entities\ExamOfficer');
    }

    public function courses()
    {
        return $this->hasMAny(Course::class);
    }
    
    public function staffs()
    {
    	return $this->hasMany('Modules\Staff\Entities\Staff');
    }
    
    public function headOfDepartments($value='')
    {
        return $this->hasMany(HeadOfDepartment::class);
    }

    public function departmentCourses()
    {
        return $this->hasMany(DepartmentCourse::class);
    }
    
    public function departmentSessionAdmissions()
    {
        return $this->hasMany(DepartmentSessionAdmission::class);
    }

    public function reservedDepartmentSessionAdmissions()
    {
        return $this->hasMany(ReservedDepartmentSessionAdmission::class);
    }

    public function lecturerCourseAllocations()
    {
        return $this->hasMany(LecturerCourseAllocation::class);
    }

    public function diferredSessions()
    {
        return $this->hasMany('Modules\Student\Entities\DiferredSession');
    }

    public function diferredSemesters()
    {
        return $this->hasMany('Modules\Student\Entities\DiferredSemester');
    }

    public function unverifiedResults()
    {
        $results = [];
        foreach ($this->departmentCourses as $department_course) {
            if($department_course->course->currentCourseLecturer() && $department_course->course->currentCourseLecturer()->lecturerCourseResultUploads){
                foreach($department_course->course->currentCourseLecturer()->lecturerCourseResultUploads as $result){
                    if($result->verification_status == 0){
                        $results[] = $result;
                    }
                }
            }
        }
        return $results;
    }
    public function sessions()
    {
        return Session::all();
    }
    public function availableGraduationSessions()
    {
        $session = [];
        foreach($this->sessions() as $session){
            if(substr(currentSession()->name, 5) - substr($session->name, 5) <= 2){
                $sessions[] = $session;
            }
        }
        return $sessions;
    }
    public function levels()
    {
        return Level::all();
    }

    public function semesters()
    {
        return Semester::all();
    }

    public function studentTypes()
    {
        return StudentType::all();
    }

    public function studentSessions()
    {
        return StudentSession::all();
    }
}
