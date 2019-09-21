<?php

namespace Modules\Admin\Entities;

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

    public function semester()
    {
    	return $this->belongsTo('Modules\College\Entities\Semester');
    }

}
