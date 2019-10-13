<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;

class DepartmentSessionAdmission extends Model
{

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

}
