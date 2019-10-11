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
        $grades = ['A','AB','B','BC','C','CD','D','E','F'];
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if(in_array($course_registration->result->grade, $grades)){
                $units = $course_registration->course->unit + $units;
            }
        }
        if($units == 0){
            $units++;
        }
        return $units;
    }

    public function totalNumberOfPoints()
    {
        $points = 0;
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if(is_numeric($course_registration->result->points)){
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
