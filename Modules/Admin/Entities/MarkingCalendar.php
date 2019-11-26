<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class MarkingCalendar extends BaseModel
{
    public function semesterCalendar()
    {
        return $this->hasOne(SemesterCalender::class);
    }

    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInWeeks(Carbon::now());
    	$week = 'Week';
    	if($count > 1){
    		$week = 'Weeks';
    	}
		return $count.' '.$week.' Remain';
    }
}