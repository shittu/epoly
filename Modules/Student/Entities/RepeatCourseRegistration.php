<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class RepeatCourseRegistration extends BaseModel
{
    public function courseRegistration()
    {
    	return $this->belongsTo(CourseRegistration::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
