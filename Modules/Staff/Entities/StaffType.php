<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class StaffType extends BaseModel
{
    public function staff()
    {
    	return $this->belongsTo(Staff::class);
    }

}
