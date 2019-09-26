<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Department extends BaseModel
{

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

    public function lecturerCourseAllocations()
    {
        return $this->hasMany(LecturerCourseAllocation::class);
    }

}
