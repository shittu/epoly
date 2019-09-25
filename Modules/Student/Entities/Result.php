<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Result extends BaseModel
{
	
    public function studentCourse()
    {
    	return $this->belongsTo(StudentCourse::class);
    }

    public function resultRemarks()
    {
    	return $this->hasMany(ResultRemark::class);
    }

    public function point()
    {
    	switch ($this->grade) {
    		case 'A':
    			$point = 4.00;
    			break;
    		case 'AB':
    			$point = 3.75;
    			break;
    		
    		case 'B':
    			$point = 3.50;
    			break;
    		
    		case 'BC':
    			$point = 3.25;
    			break;
    		
    		case 'C':
    			$point = 3.00;
    			break;
    		
    		case 'CD':
    			$point = 2.75;
    			break;
    		case 'D':
    			$point = 2.50;
    			break;
    		case 'E':
    			$point = 2.00;
    			break;
    		default:
    			$point = 0.00;
    			break;
    	}
    	return $point;
    }

}
