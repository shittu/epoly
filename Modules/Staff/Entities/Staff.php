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
    	return $this->hasOne(Profile::class);
    }

    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }
}
