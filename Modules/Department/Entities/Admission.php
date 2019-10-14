<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Staff\Entities\Tribe;
use Modules\Staff\Entities\Gender;
use Modules\Staff\Entities\Religion;
use Modules\Admission\Services\Traits\AdmissionHasDetail;

class Admission extends BaseModel
{
	
	use AdmissionHasDetail;

    public function student()
    {
    	return $this->hasOne('Modules\Student\Entities\Student');
    }

    public function genders()
    {
        return Gender::all();
    }

    public function religions()
    {
        return Religion::all();
    }

    public function tribes()
    {
        return Tribe::all();
    }
}
