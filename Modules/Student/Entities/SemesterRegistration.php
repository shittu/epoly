<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class SemesterRegistration extends BaseModel
{
    public function sessionRegistration()
    {
    	return $this->belongsTo(SessionRegistration::class);
    }

    public function courseRegistrations()
    {
    	return $this->hasMany(CourseRegistration::class);
    }

    public function semester()
    {
    	return $this->belongsTo('Modules\Department\Entities\Semester');
    }

    public function currentUnits()
    {  
    	$units = 0;
    	foreach ($this->courseRegistrations as $courseRegistration) {
    		if($courseRegistration->result->point >= 2){
                $units = $courseRegistration->course->unit + $units;
    		}
    	}
    	
    	return $units;
    }

    public function previousUnits()
    {
    	$units = 0;
    	foreach ($this->sessionRegistration->semesterRegistrations as $semesterRegistration) {
    		if($this->id != $semesterRegistration->id){
    			$units = $units + $semesterRegistration->currentUnits();
    		}
    	}
    	
    	return $units;
    }

    public function currentSemesterGradePoints()
    {
    	$points = 0;
    	foreach ($this->courseRegistrations as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload){
                $course_unit = $course_registration->course->unit;
                $points = ($course_registration->result->points * $course_unit) + $points;
            }
        }
        return $points;
    }

}
