<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class StudentCourse extends BaseModel
{

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function course()
    {
    	return $this->belongsTo('Modules\Department\Entities\Course');
    }

    public function result()
    {
    	return $this->hasOne(Result::class);
    }

    public function remarks()
    {
    	return $this->hasMany(Remark::class);
    }

}
