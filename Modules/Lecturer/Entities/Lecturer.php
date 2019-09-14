<?php

namespace Modules\Lecturer\Entities;

use Modules\Core\Entities\BaseModel;

class Lecturer extends BaseModel
{
	
    public function directer()
    {
    	return $this->hasOne('Modules\College\Entities\Directer');
    }

    public function headOfDepartment()
    {
    	return $this->hasOne('Modules\DEpartment\Entities\HeadOfDepartment');
    }
}
