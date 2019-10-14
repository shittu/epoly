<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Admission\Services\Traits\AdmissionNumberGenerator;

class Department extends BaseModel
{
    use AdmissionNumberGenerator;

    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }

    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
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

    public function lecturerCourseAllocations()
    {
        return $this->hasMany(LecturerCourseAllocation::class);
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

}
