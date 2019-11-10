<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasCurrentSessionCourses

{

    public function currentLevelCourses()
    {
        return $this->level()->courses;
    }

    public function currentLevelCourseUnits()
    {
        $units = 0;
        foreach ($this->courses() as $course) {
            $units = $units + $course->unit;
        }
        return $units;
    }
    
}