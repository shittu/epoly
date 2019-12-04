<?php
namespace Modules\Department\Services\Admission;

use Illuminate\Support\Facades\Hash;

trait CanAdmittStudent

{
	public function generateNewAdmission(array $data)
	{
		$admission = $this->registerStudentAdmission($data);

		session()->flash('message','Congratulation this admission is registered successfully and this student can logged in as student using '.$admission->admission_no.' as user name and '.$admission->admission_no.' as his password');
		return $admission;
	}

	public function registerStudentAdmission($data)
	{
		$admission = $this->admissions()->firstOrCreate([
            'admission_no'=>$this->generateAdmissionNo($data),
            'head_of_department_id'=>1,
            'session_id'=>currentSession()->id,
            'year'=> substr(currentSession()->name, 5)
        ]);
        $this->registerStudent($admission,$data);
        return $admission;
	}

	public function registerStudent($admission,$data)
	{
		$student = $admission->student()->firstOrCreate([
            'first_name'=> '',
            'last_name'=> '',
            'user_name'=>$admission->admission_no,
            'email'=> $admission->admission_no.'@sospoly.com',
            'phone'=>'0'.rand(7,9).rand(0,1).rand(00000000,99999999),
            'student_session_id'=> $this->studentSessionId($data),
            'student_type_id'=>  $this->studentTypeId($data),
            'password'=> Hash::make($admission->admission_no),
        ]);
        $this->registerStudentAccount($student);
	}

	public function registerStudentAccount($student)
	{
		$student->studentAccount()->firstOrCreate([
            'gender_id'=>rand(1,2),
            'tribe_id'=>rand(1,3),
            'religion_id'=>rand(1,3)
        ]);
	}

}