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

    public function computePoints($grade)
    {
    	switch ($grade) {
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
        
    	$this->grade = $grade;
    	$this->points = $point/$this->studentCourse->course->unit;
        if($point >= 2){
            $this->remark = 'Pass';
        }else{
            $this->remark = 'Fail';
        }
    	$this->save();
    }

    public function computeGrade()
    {
    	$score = $this->ca + $this->exam;
    	$grade = 'F';
    	if($score >= 75){
    		$grade = 'A';
    	}elseif($score >= 70){
            $grade = 'AB';
    	}elseif($score >= 65){
            $grade = 'B';
    	}elseif($score >= 60){
            $grade = 'BC';
    	}elseif($score >= 55){
            $grade = 'C';
    	}elseif($score >= 50){
            $grade = 'CD';
    	}elseif($score >= 45){
            $grade = 'D';
    	}elseif($score >= 40){
            $grade = 'E';
    	}
    	$this->computePoints($grade);
    }

}
