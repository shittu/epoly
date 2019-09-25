<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Result extends BaseModel
{
	
    public function studentCourse()
    {
    	return $this->belongsTo(StudentCourse::class);
    }

    public function resultRemarks()
    {
    	return $this->hasMany(ResultRemark::class);
    }

}
