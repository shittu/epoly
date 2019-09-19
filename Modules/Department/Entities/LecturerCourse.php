<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourse extends BaseModel
{

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
    	return $this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }

    public function lecturerCourseStatus()
    {
    	return $this->belongsTo(LecturerCourseStatus::class);
    }
    
}
