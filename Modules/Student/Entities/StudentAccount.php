<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
