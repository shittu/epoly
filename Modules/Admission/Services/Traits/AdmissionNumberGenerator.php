<?php
namespace Modules\Admission\Services\Traits;

use Modules\Admin\Entities\Session;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;
use Modules\Department\Entities\DepartmentSessionAdmission;

trait AdmissionNumberGenerator
{
	
	public function generateAdmissionNo(array $student)
	{
		$reserved_admission_no = null;
		foreach ($this->reservedDepartmentSessionAdmissions->where([
			'session_id' => currentSession()->id,
			'student_type_id'=>$student['type'],
			'student_session_id'=>$student['session']
		]) as $admission) {
			$reserved_admission_no = $admission->admission_no;
			$admission->delete();
		}
		if($reserved_admission_no){
			return $reserved_admission_no;
		}else{
			return  $this->yearExt($student).
					$this->college->code.
					$this->code.
					$student['session'].
					$student['type'].
					$this->getAdmissionSerialNo($student);
		}
	}

	public function yearExt($student)
	{
		$yearExt = substr(date('Y'), 0,2);

		if($student['year']){
            $yearExt = $student['year'];
		}
		return $yearExt;
	}

	public function getAdmissionSerialNo(array $student)
	{
		$current_serial_no = $this->departmentSessionAdmissions()->firstOrCreate([
			'session_id'=>currentSession()->id,
			'student_type_id'=>$student['type'],
			'student_session_id'=>$student['session'],
		]);
		$this->departmentSessionAdmission = $current_serial_no;
		return $this->validateThisSerialNo($current_serial_no->count + 1);
	}

	public function updateDepartmentSessionAdmissionCounter(array $student)
	{
		//update the admission counter if the current admission no is not in the reserved admission
        $reserved_admission = null;
		foreach ($this->reservedDepartmentSessionAdmissions->where(
			'admission_no',$student['admission_no']
		) as $admission) {
			$reserved_admission = $admission;
		}
		if($reserved_admission){
			$reserved_admission->delete();
		}else{
			$this->departmentSessionAdmission->update(['count' => $student['serial_no']]);
		}
		
	}

	public function validateThisSerialNo($no)
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