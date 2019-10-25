<?php

namespace Modules\ExamOfficer\Entities;

use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Illuminate\Notifications\Notifiable;
use Modules\Department\Entities\Semester;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamOfficer extends Authenticatable
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

    public function lecturer_id()
    {
        return $this->belongsTo('Modules\Admin\Entities\Admin');
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

    public function sessions()
    {
        return Session::all();
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
