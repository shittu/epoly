<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class CourseAllocationCalender extends BaseModel
{
    public function calender()
    {
    	return $this->hasOne(Calender::class);
    }
}
