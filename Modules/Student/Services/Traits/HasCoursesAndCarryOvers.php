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
    
}