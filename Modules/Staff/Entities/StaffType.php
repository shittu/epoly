<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class StaffType extends BaseModel
{
    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
}
