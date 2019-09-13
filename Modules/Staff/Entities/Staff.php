<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Staff extends BaseModel
{

    public function lecturer()
    {
    	return $this->hasOne('Modules\Lecturer\Entities\Lecturer');
    }

    public function staffType()
    {
    	return $this->belongsTo(StaffType::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
