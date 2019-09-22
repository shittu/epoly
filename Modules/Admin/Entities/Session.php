<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class Session extends BaseModel
{
    public function calenders()
    {
    	return $this->hasMany(Calender::class);
    }

    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInMonths(Carbon::now());
    	$month = 'Month';
    	if($count > 1){
    		$month = 'Months';
    	}
		return $count.' '.$month.' Remain';
    }
}
