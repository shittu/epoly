<?php

namespace Modules\Department\Entities;

use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Department\Entities\Semester;
use Modules\Department\Entities\Level;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;

class HeadOfDepartment extends Authenticatable
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
    
    public function admissions()
    {
        return $this->hasMany('Modules\Department\Entities\Admission');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function duration()
    {
        $start = Carbon::now();
        if($this->to){
            $start = Carbon::parse($this->to);
        }
        $count = Carbon::parse($this->from)->diffInMonths($start);
        $month = 'Month';
        if($count > 1){
            $month = 'Months';
        }
        return $count.' '.$month;
    }

    public function levels()
    {
        return Level::all();
    }

    public function semesters()
    {
        return Semester::all();
    }

    public function studentTypes()
    {
        return StudentType::all();
    }

    public function studentSessions()
    {
        return StudentSession::all();
    }
}
