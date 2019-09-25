<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class StudentAccount extends BaseModel
{
    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
