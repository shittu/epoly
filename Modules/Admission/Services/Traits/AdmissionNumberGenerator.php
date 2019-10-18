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
			'session_id' => $this->getSession()->id,
			'student_type_id'=>$student['type'],
			'student_session_id'=>$student['session']
		]) as $admission) {
			$reserved_admission_no = $admission->admission_no;
			$admission->delete();
		}
		if($reserved_admission_no){
			return $reserved_admission_no;
		}
		return  $this->yearExt().
				$this->collegeCode().
				$this->departmentCode().
				$this->getStudentSession($student['session'])->code.
				$this->getStudentType($student['type'])->code.
				$this->getAdmissionSerialNo($student);
	}

	public function yearExt()
	{
		return substr(date('Y'),2);
	}

	public function collegeCode()
	{
		return $this->college->code;
	}

	public function departmentCode()
	{
		return $this->code;
	}

    public function getSession()
    {
    	return Session::where('name',currentSession())->first();
    }

    public function getStudentType($id)
    {
    	return StudentType::find($id);
    }
    
    public function getStudentSession($id)
    {
    	return StudentSession::find($id);
    }
	public function getAdmissionSerialNo(array $student)
	{
		$current_serial_no = $this->departmentSessionAdmissions()->firstOrCreate([
			'session_id'=>$this->getSession()->id,
			'student_type_id'=>$this->getStudentType($student['type'])->id,
			'student_session_id'=>$this->getStudentSession($student['session'])->id
		]);
		return $this->validateThisSerialNo($current_serial_no->count + 1);
	}

	public function updateDepartmentSessionAdmissionCounter(array $student)
	{
		//update the admission counter if the current admission no is not in the reserved admission
        $reserved_admission = null;
		foreach ($this->reservedDepartmentSessionAdmissions->where([
			'admission_no' => $this->generateAdmissionNo($student),
		]) as $admission) {
			$reserved_admission = $admission;
		}
		if($reserved_admission){
			$reserved_admission->delete();
		}else{
            $admission = DepartmentSessionAdmission::where([
				'department_id'=>$this->id,
				'session_id'=>$this->getSession()->id,
				'student_type_id'=>$this->getStudentType($student['type'])->id,
				'student_session_id'=>$this->getSession($student['session'])->id
			])->first();
			$admission->update(['count'=>$this->getAdmissionSerialNo($student)]);
		}
		
	}

	public function validateThisSerialNo($no)
	{
		if($no < 9){
			$valid_no = '00'.$no;
		}elseif ($no < 100) {
			$valid_no = '0'.$no;
		}else{
			$valid_no = $no;
		}
		return $valid_no;
	}

}