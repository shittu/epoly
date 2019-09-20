<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Admission extends BaseModel
{
    public function student()
    {
    	return $this->hasOne('Modules\Student\Entities\Student');
    }
}
