<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Result extends BaseModel
{
	
    public function courseRegistration()
    {
    	return $this->belongsTo(CourseRegistration::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }

    public function lecturerCourseResultUpload()
    {
        return $this->belongsTo('Modules\Lecturer\Entities\LecturerCourseResultUpload');
    }
    
    public function approved()
    {
        if($this->lecturerCourseResultUpload && $this->lecturerCourseResultUpload->verification_status == 1){
            return true;
        }
        return false;
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
            case 'S':
                $point = -1.00;
                break;
            case 'I':
                $point = -2.00;
                break;
            case 'X':
                $point = -3.00;
                break;
    		default:
    			$point = 0.00;
    			break;
    	}
        
    	$this->grade = $grade;
        if($point >= 2){
            $this->points = number_format($point,2);
        }else{
            $this->points = 0.00;
        }
        if($point >= 2){
            $this->remark_id = 5;
            if($this->courseRegistration->repeatCourseRegistration){
                $this->courseRegistration->repeatCourseRegistration->update(['status'=>0]);
            }
        }elseif($point == 0){
            $this->remark_id = 6;
            $this->repeat();
        }elseif($point == -1){
            $this->remark_id = 7;
            $this->reRegister();
        }elseif($point == -2){
            $this->remark_id = 8;
            $this->reRegister();
        }elseif($point == -3){
            $this->remark_id = 9;
            $this->reRegister();
        }
    	$this->save();
    }
    public function repeat()
    {
        $this->courseRegistration->course->repeatCourses()->firstOrCreate([
            'student_id'=>$this->courseRegistration->semesterRegistration->sessionRegistration->student->id,
            'session_id'=>$this->courseRegistration->session_id + 1,
            'status'=>1
        ]);
    }

    public function reRegister()
    {
        $this->courseRegistration->course->reRegisterCourse()->firstOrCreate([
            'student_id'=>$this->courseRegistration->semesterRegistration->sessionRegistration->student->id,
            'session_id'=>$this->courseRegistration->session_id + 1,
            'status'=>1
        ]);
    }

    public function computeGrade()
    {
        if(is_numeric($this->exam)){
            $score = $this->accessment() + $this->exam + $this->amended_by;
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
            }else{
                $grade = 'F';
            }
        }else{
            switch (strtoupper($this->exam)) {
                case 'S':
                    $grade = 'S';
                    break;
                
                case 'X':
                    $grade = 'X';
                    break;
                
                case 'I':
                    $grade = 'I';
                    break;
                
                default:
                    $grade = '';
                    break;
            }
        }
    	
    	$this->computePoints($grade);
    }
    public function accessment()
    {
        if(is_numeric($this->ca)){
            return $this->ca;
        }
        return 0;
    }
    public function examination()
    {
        if(is_numeric($this->exam)){
            return $this->exam;
        }
        return 0;
    }

}
