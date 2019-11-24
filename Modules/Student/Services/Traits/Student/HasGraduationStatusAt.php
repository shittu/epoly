<?php
namespace Modules\Student\Services\Traits\Student;

trait HasGraduationStatusAt

{

    public function graduatedAt($session)
    {
        if(empty($this->currentLevelReRegisterCoursesAt($session)) && $this->yearsSinceAdmission() >= 2){
            return true;
        }
        return false;
    }

    public function spillededAt($session)
    {
        if(!empty($this->currentLevelReRegisterCoursesAt($session)) && $this->yearsSinceAdmission() >= 2){
            return true;
        }
        return false;
    }

    public function withDrawedAt($session)
    {
    	if(!empty($this->currentLevelReRegisterCoursesAt($session)) && !$this->canMakeCourseRegistration()){
            return true;
        }
        return false;
    }

}