<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Level extends BaseModel
{
    public function courese()
    {
    	return $this->hasMany(Course::class);
    }
}
