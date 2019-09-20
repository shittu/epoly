<?php

namespace Modules\Student\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'student_type_id'
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
}
