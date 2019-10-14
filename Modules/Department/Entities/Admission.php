<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Admission\Services\Traits\AdmissionHasDetail;

class Admission extends BaseModel
{
	
	use AdmissionHasDetail;

    public function student()
    {
    	return $this->hasOne('Modules\Student\Entities\Student');
    }
}
