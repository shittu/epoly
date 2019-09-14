<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Department extends BaseModel
{
    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }
}
