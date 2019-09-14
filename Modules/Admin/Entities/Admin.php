<?php

namespace Modules\Admin\Entities;
use Modules\Staff\Entities\Tribe;
use Modules\Staff\Entities\Gender;
use Modules\Staff\Entities\Religion;
use Modules\Staff\Entities\StaffType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	use Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
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

    public function colleges()
    {
        return $this->hasMany('Modules\College\Entities\College');
    }

    public function staffTypes()
    {
        return StaffType::all();
    }

    public function genders()
    {
        return Gender::all();
    }

    public function religions()
    {
        return Religion::all();
    }
    public function tribes()
    {
        return Tribe::all();
    }
}
