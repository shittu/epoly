<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class Session extends BaseModel
{
    public function calenders()
    {
    	return $this->hasMany(Calender::class);
    }
}
