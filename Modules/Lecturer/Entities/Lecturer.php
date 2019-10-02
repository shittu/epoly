<?php

namespace Modules\Lecturer\Entities;

use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'from',
        'email',
        'password',
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
    

    public function lecturerCourses()
    {
        return $this->hasMany('Modules\Department\Entities\LecturerCourse');
    }

    public function duration()
    {
        $date = strtotime($this->from) - time();
        if($this->to){
            $date = strtotime($this->to) - strtotime($this->from);
        }
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('H',$date), date('i',$date), date('s',$date))->diffForHumans();
    }

    public function sessions()
    {
        return Session::all();
    }

}
