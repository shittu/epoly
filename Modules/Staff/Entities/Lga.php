<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Lga extends BaseModel
{
    public function state()
    {
    	return $this->belongsTo(State::class);
    }
}
