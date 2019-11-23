<?php
namespace Modules\Student\Services\Traits\Student;

trait HasGraduationStatus

{
	public function graduationYearLimit()
	{
		$this->admission->year+$this->yearsToGraduate();
	}

	public function yearsToGraduate()
	{
		$expectedYearsToGraduate = 4;
		if($this->diferredSessions){
			$expectedYearsToGraduate = $expectedYearsToGraduate + count($this->diferredSessions);
		}
		return $expectedYearsToGraduate;
	}

    public function currentSessionYear()
    {
    	return substr(currentSession()->name, 5);
    }

    public function canMakeCourseRegistration()
    {
    	if($this->yearsToGraduate() < $this->yearSinceAdmission()){
    		return true;
    	}
    	return false;
    }

    public function graduated()
    {
        if(empty($this->currentLevelReRegisterCourses()) && $this->yearSinceAdmission() >= 2){
            return true;
        }
        return false;
    }

    public function withDrawed()
    {
    	if(!empty($this->currentLevelReRegisterCourses()) && !$this->canMakeCourseRegistration()){
            return true;
        }
        return false;
    }

}