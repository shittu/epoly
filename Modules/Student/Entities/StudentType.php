<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class StudentType extends BaseModel
{
	
    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function levels()
    {
    	return $this->hasMany('Modules\Department\Entities\Level');
    }

}
