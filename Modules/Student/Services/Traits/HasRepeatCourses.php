<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasRepeatCourses

{

    public function currentSessionCarryOverCourseUnits()
    {
        $units = 0;
        foreach ($this->repeatCourses as $repeatCourse) {
            $units = $units + $repeatCourse->course->unit;
        }
        return $units;
    }
    
}