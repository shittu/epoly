<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class DiferredSession extends BaseModel
{
    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function diferringStatus()
    {
    	reteurn $this->belongsTo(DiferringStatus::class);
    }
}
