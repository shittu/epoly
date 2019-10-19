<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class SemesterRegistrationRemark extends Model
{
    public function semesterRegistration()
    {
    	return $this->belongsTo(SemesterRegistration::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }
    
}
