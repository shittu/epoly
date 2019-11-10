<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasCurrentLevelCourses

{

    public function currentLevelCourses()
    {
        return $this->level()->courses;
    }

    public function currentLevelCourseUnits()
    {
        $units = 0;
        foreach ($this->currentLevelCourses() as $course) {
            $units = $units + $course->unit;
        }
        return $units;
    }
    
}