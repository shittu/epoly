<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasCoursesAndCarryOvers

{

    public function courses()
    {
        return $this->level()->courses;
    }

    public function carryOvers()
    {
        return $this->repeatCourseRegistrations->where('status',1);
    }

    public function currentSessionCourseUnits()
    {
        $units = 0;
        foreach ($this->courses() as $course) {
            $units = $units + $course->unit;
        }
        return $units;
    }

    public function currentSessionCarryOverCourseUnits()
    {
        $units = 0;
        foreach ($this->carryOvers() as $repeatCourse) {
            $units = $units + $repeatCourse->courseRegistration->course->unit;
        }
        return $units;
    }
    
}