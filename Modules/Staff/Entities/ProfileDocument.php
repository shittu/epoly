<?php

namespace Modules\Staff\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfileDocument extends Model
{
    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
