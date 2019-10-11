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
    
    public function sessionGrandPoints()
    {
        $units = 0;
        $points = 0;
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload){
                $course_unit = $course_registration->course->unit;
                $units = $course_unit + $units;
                $points = ($course_registration->result->points * $course_unit) + $points;
            }
        }
        if($units == 0){
            $units++;
        }
        return number_format($points/$units,2);
    }

    public function failedResults()
    {
        $courses = [];
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->grade == 'F'){
                $courses[] = $course_registration->course;
            }
        }
        return $courses;
    }

    public function passedResults()
    {
        $course = 0;
        foreach ($this->sessionCourseRegistrations as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->points > 2){
                $course++;
            }
        }
        return $course;
    }

}
