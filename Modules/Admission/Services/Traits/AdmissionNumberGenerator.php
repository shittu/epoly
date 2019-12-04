<?php
namespace Modules\Admission\Services\Traits;

use Modules\Admin\Entities\Session;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;
use Modules\Department\Entities\DepartmentSessionAdmission;
use Modules\Department\Entities\ReservedDepartmentSessionAdmission;

trait AdmissionNumberGenerator
{
	
	public function generateAdmissionNo(array $student)
	{
        
		$reservedAdmission = $this->getAdmissionFromTheReserved($student);
		  
		if($reservedAdmission){
			$admissionNo = $reservedAdmission->admission_no;
			$reservedAdmission->delete();
		}else{
			$admissionNo =  $this->yearExt($student).
					$this->college->code.
					$this->code.
					$student['session'].
					$student['type'].
					$this->getAdmissionSerialNo($student);
		}
		return $admissionNo;
	}

	public function yearExt($student)
	{
		return substr(currentSession()->name,7);
	}

    public function getAdmissionFromTheReserved($student)
    {
    	$admission = null;
    	foreach (ReservedDepartmentSessionAdmission::where([
            'department_id'=> 1,
            'session_id'=> currentSession()->id,
            'student_type_id'=> $this->studentTypeId($student),
            'student_session_id'=> $this->studentSessionId($student)
    	])->get() as $reservedAdmission) {
    		if(!$admission){
                $admission = $reservedAdmission;
    		}
    	}
    	return $admission;
    }
    
	public function getAdmissionSerialNo($student)
	{
		$serialNo = $this->getAdmissionCounter($student);
		if(isset($student['serial_no'])){
			$serialNo = $student['serial_no'];
		}
		return $this->formatThisSerialNo($serialNo);
	}

    public function getAdmissionCounter($student)
    {
    	$counter = $this->departmentSessionAdmissions()->firstOrCreate([
            'session_id' => currentSession()->id,
            'student_session_id' => $this->studentSessionId($student),
            'student_type_id' => $this->studentTypeId($student)
    	]);
    	//update the counter for the next admission
    	$counter->update(['count'=>$counter->count += 1]);
    	return $counter->count;
    }

    public function studentTypeId($student)
    {
    	$id = null;
    	foreach ($this->studentTypes() as $type) {
    		if($type->code == $student['type']){
    			$id = $type->id;
    		}
    	}
    	return $id;
    }

    public function studentSessionId($student)
    {
    	$id = null;
    	foreach ($this->studentSessions() as $session) {
    		if($session->code == $student['session']){
    			$id = $session->id;
    		}
    	}
    	return $id;
    }

	public function formatThisSerialNo($no)
	{
		if($no <= 9){
			$valid_no = '00'.$no;
		}elseif ($no < 100) {
			$valid_no = '0'.$no;
		}else{
			$valid_no = $no;
		}
		return $valid_no;
	}

}