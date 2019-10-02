<?php

namespace Modules\Student\Entities;

use Illuminate\Notifications\Notifiable;
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

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function currentRegisteredCourses()
    {
        $courses = [];
        $level = Level::where('name',$this->level())->first();
        foreach ($this->studentCourses()->where('level_id',$level->id)->get() as $student_course) {
            $courses[] = $student_course->course;
        }
        return $courses;
    }
    
}
