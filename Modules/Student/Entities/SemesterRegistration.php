<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Department\Services\Results\Student\ResultGeneralRemark;

class SemesterRegistration extends BaseModel
{
	use ResultGeneralRemark;

    public function sessionRegistration()
    {
    	return $this->belongsTo(SessionRegistration::class);
    }

    public function semesterRegistrationRemarks()
    {
    	return $this->hasMany(SemesterRegistrationRemark::class);
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
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
    		if($courseRegistration->result->lecturerCourseResultUpload && $courseRegistration->result->points > 0){
                $units = $courseRegistration->course->unit + $units;
    		}
    	}
    	return $units;
    }

    public function registeredUnits()
    {  
    	$units = 0;
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
            $units = $courseRegistration->course->unit + $units;
    	}
    	return $units;
    }

    public function previousUnits()
    {
    	$units = 0;
    	foreach ($this->sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
    		if($this->id > $semesterRegistration->id){
    			$units = $units + $this->getThisSemesterUnits($semesterRegistration);
    		}
    	}
    	return $units;
    }

    public function previousRegisteredUnits()
    {
    	$units = 0;
    	foreach ($this->sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
    		if($this->id > $semesterRegistration->id){
    			foreach ($semesterRegistration->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
		            $units = $courseRegistration->course->unit + $units;
		        }
    		}
    	}
    	return $units;
    }
    
    public function getThisSemesterUnits($semester)
    {
    	$units = 0;
    	foreach ($semester->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
    		if($courseRegistration->result->lecturerCourseResultUpload && $courseRegistration->result->points > 0){
                $units = $courseRegistration->course->unit + $units;
    		}
    	}
    	return $units;
    }
    public function cummulativeUnits()
    {
    	return $this->previousUnits() + $this->currentUnits();
    }

    public function cummulativeRegisteredUnits()
    {
    	return $this->previousRegisteredUnits() + $this->registeredUnits();
    }

    public function currentSemesterGradePoints()
    {
    	$points = 0;
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload){
                $course_unit = $course_registration->course->unit;
                $points = ($course_registration->result->points * $course_unit) + $points;
            }
        }
        return $points;
    }

    public function gradePointAsAtLastSemester()
    {
    	$points = 0;
    	foreach ($this->sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
    		if($this->id > $semesterRegistration->id){
    			$points = $points + $semesterRegistration->currentSemesterGradePoints();
    		}
    	}
    	return $points;
    }

    public function cummulativeGradePoints()
    {
    	return $this->gradePointAsAtLastSemester() + $this->currentSemesterGradePoints();
    }

    public function currentSemesterCummulativeGradePointsAverage()
    {
    	$units = $this->registeredUnits();
    	if($units < 1){
    		$units = 1;
    	}
    	return $this->currentSemesterGradePoints() / $units;
    }

    public function cummulativeGradePointsAverage()
    {
    	$units = $this->cummulativeRegisteredUnits();
    	if($units < 1){
    		$units = 1;
    	}
    	return $this->cummulativeGradePoints() / $units;
    }
    public function allCoursesUploaded()
    {
        $upload = true;
        foreach ($this->courseRegistrations as $course_registration) {
            if(!$course_registration->result->lecturerCourseResultUpload){
                $upload = false;
            }
        }
        return $upload;
    }
    public function failedResults()
    {
        $courses = [];
        if($this->cancelation_status == 0){
	    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $course_registration) {
	            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->grade == 'F'){
	                $courses[] = $course_registration->course;
	            }
	        }
        }
        return $courses;
    }

    public function passedResults()
    {
        $course = 0;
        if($this->cancelation_status == 0){
            foreach ($this->courseRegistrations->where('ancelation_status',0) as $course_registration) {
	            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->points > 2){
	                $course++;
	            }
	        }
        }
        
        return $course;
    }

}
