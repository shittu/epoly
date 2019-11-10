<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class RepeatCourse extends BaseModel
{
    public function course()
    {
    	return $this->belongsTo('Modules\Department\Entities\Course');
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
