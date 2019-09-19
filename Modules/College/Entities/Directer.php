<?php

namespace Modules\College\Entities;

use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Directer extends Authenticatable
{
    use Notifiable;
    
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

    public function duration()
    {
        $date = strtotime($this->from) - time();
        if($this->to){
            $date = strtotime($this->to) - strtotime($this->from);
        }
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('H',$date), date('i',$date), date('s',$date))->diffForHumans();
    }
}
