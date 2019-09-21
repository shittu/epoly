<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class UploadResultCalender extends BaseModel
{
    public function calender()
    {
    	return $this->hasOne(Calender::class);
    }
}
