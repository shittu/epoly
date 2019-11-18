<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class DiferredSession extends Model
{
    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
