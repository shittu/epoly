<?php

namespace Modules\Lecturer\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourseResultUpload extends BaseModel
{
    public function lecturerCourse()
    {
    	return $this->belongsTo('Modules\Department\Entities\LecturerCourse');
    }

    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }
}
