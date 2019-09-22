<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class Calender extends BaseModel
{
    public function courseAllocationCalender()
    {
    	return $this->belongsTo(CourseAllocationCalender::class);
    }

    public function examCalender()
    {
    	return $this->belongsTo(ExamCalender::class);
    }

    public function lectureCalender()
    {
    	return $this->belongsTo(LectureCalender::class);
    }

    public function markingCalender()
    {
    	return $this->belongsTo(MarkingCalender::class);
    }

    public function uploadResultCalender()
    {
    	return $this->belongsTo(UploadResultCalender::class);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function session()
    {
    	return $this->belongsTo(Session::class);
    }

    public function semester()
    {
    	return $this->belongsTo('Modules\Department\Entities\Semester');
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
