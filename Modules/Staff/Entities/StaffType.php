<?php

namespace Modules\Staff\Entities;

use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
    
}
