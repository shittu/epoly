<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Level extends BaseModel
{
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
