<?php

namespace Modules\College\Entities;

use Illuminate\Database\Eloquent\Model;

class Directer extends Model
{
    protected $fillable = [
    	'email',
    	'password',
    	'admin_id',
    	'staff_id',
    	'from',
    	'to',
    	'department_id'
    ];

    public function staff()
    {
        return $this->belongsTo('Modules\Staff\Entities\Staff');
    }

    public function admin()
    {
        return $this->belongsTo('Modules\Admin\Entities\Admin');
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
