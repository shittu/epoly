<?php

namespace Modules\College\Entities;

use Modules\Core\Entities\BaseModel;

class College extends BaseModel
{
    public function admin()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Admin');
    }

    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
    }
    
}
