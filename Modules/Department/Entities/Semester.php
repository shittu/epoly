<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Semester extends Model
{
    public function courese()
    {
    	return $this->hasMany(Course::class);
    }
}
