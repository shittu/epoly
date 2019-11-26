<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class SessionCalendar extends BaseModel
{

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function session()
    {
    	return $this->belongsTo(Session::class);
    }
    
}
