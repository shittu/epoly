<?php
namespace Modules\Admission\Services\Traits;

use Modules\Admin\Entities\Session;
use Modules\Department\Entities\DepartmentSessionAdmission;

trait AdmissionNumberGenerator
{
	public function admissionNo(array $student)
	{
		return  $this->yearExt().
				$this->collegeCode().
				$this->departmentCode().
				$student['type'].
				$student['session'].
				$this->getAdmissionSerialNo();
	}

	public function yearExt()
	{
		return substr(date('Y'),0,2);
	}

	public function collegeCode()
	{
		return $this->college->code;
	}

	public function departmentCode()
	{
		return $this->code;
	}

	public function getAdmissionSerialNo()
	{
		$session = Session::where('name',curresntSession())->first();
		$current_serial_no = $this->departmentSessionAdmissions()->firstOrCreate([
			'session_id'=>$session->id,
		]);
		return $this->validateThisSerialNo($current_serial_no->count + 1);
	}

	public function updateDepartmentSessionAdmissionCounter()
	{
		$admission = DepartmentSessionAdmission::where([
			'department_id'=>$this->id,
			'session_id'=>$this->getSession()->id
		])->first();
		$admission->update(['count'=>$this->getAdmissionSerialNo()]);
	}

	public function validateThisSerialNo($no)
	{
		if($no < 9){
			$valid_no = 000.$no,
		}elseif ($no < 100) {
			$valid_no = 00.$no;
		}elseif ($no <1000) {
			$valid_no = 0.$no;
		}else{
			$valid_no = $no;
		}
		return $valid_no;
	}
	
}