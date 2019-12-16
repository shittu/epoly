<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class State extends BaseModel
{
    public function lgas()
    {
    	return $this->hasMany(Lga::class);
    }
}
