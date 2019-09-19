<?php

namespace Modules\Lecturer\Entities;

use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'is_active',
        'staff_id',
        'admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function staff()
    {
        return $this->belongsTo('Modules\Staff\Entities\Staff');
    }

    public function lecturerCourseAllocations()
    {
        return $this->hasMany('Modules\Department\Entities\LecturerCourseAllocation');
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
