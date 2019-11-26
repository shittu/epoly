<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class SemesterCalendar extends Model
{
	public function sessionCalendar()
	{
		return $this->belongsTo(SessionCalendar::class);
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

    public function courseAllocationCalender()
    {
    	return $this->hasOne(CourseAllocationCalender::class);
    }

    public function examCalender()
    {
    	return $this->hasOne(ExamCalender::class);
    }

    public function lectureCalender()
    {
    	return $this->hasOne(LectureCalender::class);
    }

    public function markingCalender()
    {
    	return $this->hasOne(MarkingCalender::class);
    }

    public function uploadResultCalender()
    {
    	return $this->hasOne(UploadResultCalender::class);
    }
}
