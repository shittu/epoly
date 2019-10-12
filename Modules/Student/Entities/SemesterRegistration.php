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
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }
}
