<?php

namespace Modules\College\Entities;

use Modules\Core\Entities\BaseModel;

class CollegeDirecter extends BaseModel
{
    public function lecturer()
    {
    	return $this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }

    public function college()
    {
    	return $this->belongsTo(College::class);
    }
}
