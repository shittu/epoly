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
    
    public function sessionGrandPoints($semester)
    {
        $units = 0;
        $points = 0;
        if($semester == 1){
            foreach ($this->sessionCourseRegistrations->where('semester_id',$semester) as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload){
                    $course_unit = $course_registration->course->unit;
                    $units = $course_unit + $units;
                    $points = ($course_registration->result->points * $course_unit) + $points;
                }
            }
        }else{
            foreach ($this->sessionCourseRegistrations as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload){
                    $course_unit = $course_registration->course->unit;
                    $units = $course_unit + $units;
                    $points = ($course_registration->result->points * $course_unit) + $points;
                }
            }
        }
        if($units == 0){
            $units++;
        }
        return number_format($points/$units,2);
    }

    public function failedResults($semester)
    {
        $courses = [];
        if($semester == 1){
            foreach ($this->sessionCourseRegistrations->where('semester_id',$semester) as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->grade == 'F'){
                    $courses[] = $course_registration->course;
                }
            }
        }else{
            foreach ($this->sessionCourseRegistrations as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->grade == 'F'){
                    $courses[] = $course_registration->course;
                }
            }
        }
        
        return $courses;
    }

    public function passedResults($semester)
    {
        $course = 0;
        if($semester==1){
            foreach ($this->sessionCourseRegistrations->where('semester_id',$semester) as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->points > 2){
                    $course++;
                }
            }
        }else{
            foreach ($this->sessionCourseRegistrations as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->points > 2){
                    $course++;
                }
            }
        }
        
        return $course;
    }

    public function hasUpload($semester)
    {
        $upload = false;
        if($semester == 1){
            foreach ($this->sessionCourseRegistrations->where('semester_id',$semester) as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload){
                    $upload = true;
                }
            }
        }else{
            foreach ($this->sessionCourseRegistrations as $course_registration) {
                if($course_registration->result->lecturerCourseResultUpload){
                    $upload = true;
                }
            }
        }
        
        return $upload;
    }

    public function remarks()
    {
        $remarks = [];
        foreach (Remark::where('remark_type_id',2)->get() as $remark) {
            $remarks[] = $remark;
        }
        return $remarks;
    }

}
