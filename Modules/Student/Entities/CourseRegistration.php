<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class CourseRegistration extends BaseModel
{

    public function course()
    {
    	return $this->belongsTo('Modules\Department\Entities\Course');
    }

    public function result()
    {
    	return $this->hasOne(Result::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }

    public function semesterRegistration()
    {
        return $this->belongsTo(SemesterRegistration::class);
    }

    public function repeatCourseRegistration()
    {
        return $this->hasOne(RepeatCourseRegistration::class);
    }

    public function session()
    {
        return $this->belongsTo('Modules\Admin\Entities\Session');
    }
    
}
