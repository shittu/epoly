<?php
namespace Modules\Student\Services\Traits\Student;

trait HasGraduationStatus

{
	public function graduationYear()
	{
		# code...
	}

	public function yearsToGraduate()
	{
		# code...
	}
    /*
    this method will check if the student need to extend 
    the graduation year for a reason
    */
	public function hasSessionExtension()
	{
		if($this->getAvailableCanceledSessions() || $this->getAvailableCanceledSemesters()){
			return true
		}
	}

	public function graduationYearExtendsTo()
	{
		if($this->hasSessionExtension()){

		}
	}

	public function getAvailableDiferredSession()
	{
		# code...
	}
    /*
    this method will return all the semesterRegistration 
    that have been canceled
    */
	public function getAvailableCanceledSessions()
	{
		return $this->sessionRegistrations->where('cancelation_status',1);
	}

    /*
    this method will return all the semesterRegistration 
    that have been canceled
    */
	public function getAvailableCanceledSemesters()
	{
		$semesters = [];
		foreach ($this->sessionRegistrations as $sessionRegistration) {
			foreach ($sessionRegistration->semesterRegistrations->where('cancelation_status',1) as $semesterRegistration) {
				$semesters[] = $semesterRegistration;
			}
			return $semesters;
		}
	}

}