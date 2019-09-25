<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Remark extends BaseModel
{
    public function resultRemarks()
    {
    	return $this->hasMany(ResultRemark::class);
    }

    public function remarkType()
    {
    	return $this->belongsTo(RemarkType::class);
    }
}
