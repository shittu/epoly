<?php

namespace Modules\Student\Entities;

use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Student\Services\Traits\HasLevelAndSemester;

class Student extends Authenticatable
{
	use Notifiable, HasLevelAndSemester;

	protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'student_type_id',
        'student_session_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admission()
    {
    	return $this->belongsTo('Modules\Department\Entities\Admission');
    }

    public function studentAccount()
    {
    	return $this->hasOne(StudentAccount::class);
    }

    public function studentType()
    {
    	return $this->belongsTo(StudentType::class);
    }

    public function studentSession()
    {
        return $this->belongsTo(StudentSession::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }
    
    public function repeatCourseRegistrations()
    {
        return $this->hasMany(RepeatCourseRegistration::class);
    }
    
    public function currentRegisteredCourses()
    {
        $courses = [];
        foreach ($this->sessionRegistrations()->where('level_id',$this->level()->id)->get() as $session_registration) {
            foreach ($session_registration->semesterRegistrations as $semester_registration) {
                foreach ($semester_registration->courseRegistrations as $course_registraion) {
                    $courses[] = $course_registraion->course;
                }
            } 
        }
        return $courses;
    }

    public function makeCurrentSessionRegistration()
    {
        $flag = false;
        foreach ($this->sessionRegistrations->where('session_id',currentSession()->id) as $session) {
            $flag = true;
        }
        return $flag;
    }

    public function units()
    {
        
    }
    
}
