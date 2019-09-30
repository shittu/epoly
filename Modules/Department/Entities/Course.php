<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Course extends BaseModel
{
    public function departmentCourses()
    {
    	return $this->hasMany(DepartmentCourse::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function studentCourses()
    {
        return $this->hasMany('Modules\Student\Entities\StudentCourse');
    }
    
    public function lecturerCourses()
    {
    	return $this->hasMany(LecturerCourse::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function semester()
    {
    	return $this->belongsTo(Semester::class);
    }

    public function lecturerCourseAllocations()
    {
    	return $this->hasMany(LecturerCourseAllocation::class);
    }

    public function currentCourseMaster()
    {
        $lecturer = null;
        foreach($this->lecturerCourses as $allocation){
            if($allocation->is_active == 1 && $allocation->lecturer_course_status_id == 2){
                $lecturer = $allocation->lecturer;
            }
        }
        return $lecturer;
    }

    public function currentCourseAssistance()
    {
        $lecturer = null;
        foreach($this->lecturerCourses as $allocation){
            if($allocation->is_active == 1 && $allocation->lecturer_course_status_id == 1){
                $lecturer = $allocation->lecturer;
            }
        }
        return $lecturer;
    }

}
