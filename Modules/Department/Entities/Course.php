<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Course extends BaseModel
{
    public function departmentCourses()
    {
    	return $this->hasMany(DepartmentCourse::class);
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
}
