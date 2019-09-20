<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function admission()
    {
    	return $this->belongsTo('Modules\Department\Entities\Admission');
    }

    public function studentAccount()
    {
    	return $this->hasOne(StudentAccount::class);
    }
}
