<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Department extends BaseModel
{
    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }
    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
    }
    public function staffs()
    {
    	return $this->hasMany('Modules\Staff\Entities\Staff');
    }
}
