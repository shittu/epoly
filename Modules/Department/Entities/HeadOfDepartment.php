<?php

namespace Modules\Department\Entities;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class HeadOfDepartment extends Model
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

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function duration()
    {
        $date = strtotime($this->from) - time();
        if($this->to){
            $date = strtotime($this->from) - strtotime($this->to) ;
        }
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('H',$date), date('i',$date), date('s',$date))->diffForHumans();
    }
}
