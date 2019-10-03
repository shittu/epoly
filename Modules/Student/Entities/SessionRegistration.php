<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class SessionRegistration extends BaseModel
{
    public function level()
    {
        return $this->belongsTo('Modules\Department\Entities\Level');
    }

    public function session()
    {
        return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function sessionRegistrationRemarks()
    {
    	return $this->hasMany(SessionRegistrationRemark::class);
    }

    public function sessionCourseRegistrations()
    {
    	return $this->hasMany(SessionCourseRegistration::class);
    }
    
    public function totalNumberOfUnits()
    {
        $units = 0;
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if($course_registration->result->grade != '--'){
                $units = $course_registration->course->unit + $units;
            }
        }
        return $units;
    }

    public function totalNumberOfPoints()
    {
        $points = 0;
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if($course_registration->result->grade != '--'){
                $points = $course_registration->result->points + $points;
            }
        }
        return $points;
    }

    public function sessionGrandPoints()
    {
        return $this->totalNumberOfPoints()/$this->totalNumberOfUnits();
    }
}
