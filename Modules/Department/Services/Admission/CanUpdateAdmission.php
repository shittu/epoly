<?php
namespace Modules\Department\Services\Admission;

use Illuminate\Support\Facades\Hash;

trait CanUpdateAdmission

{
    public function updateThisAdmission($data)
    {
    	if($this->needToGenerateAdmissionNo($data)){
    		$this->reservedThisAdmissionNo($data);
    		$this->update([
    			'admission_no'=>$this->generateAnotherAdmissionNo($data)
    	    ]);
    	}
    	$this->updateStudendInformation($data);
    	$this->updateStudentAccount($data);
    }

    public function needToGenerateAdmissionNo($data)
    {
    	if($data['type'] != $this->typeNo() || $data['session'] != $this->sessionNo()){
    		return true;
    	}
    }

    public function reservedThisAdmissionNo($data)
    {
    	department()->reservedDepartmentSessionAdmissions()->firstOrCreate([
            'session_id'=>currentSession()->id,
            'student_session_id'=>$this->student->student_session_id,
            'student_type_id'=>$this->student->student_type_id,
            'admission_no' => $this->admission_no
        ]);
    }

    public function generateAnotherAdmissionNo($data)
    {
    	return department()->generateAdmissionNo($data);
    }

    public function updateStudendInformation($data)
    {
    	$student = $this->student->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone'],
            'email'=>$this->admission_no.'@sospoly.com',
            'password'=>Hash::make($this->admission_no),
            'student_type_id' => department()->studentTypeId($data),
            'student_session_id' => department()->studentSessionId($data),
        ]);
    }

    public function updateStudentAccount($data)
    {
    	$this->student->studentAccount->update([
            'gender_id'=>$data['gender'],
            'tribe_id'=>$data['tribe'],
            'religion_id'=>$data['religion'],
        ]);
        session()->flash('message','Congratulation this admission is updated successfully and this student can logged in as student using '.$this->admission_no.' as his user name and '.$this->admission_no.' as his password');
    }
}


       
        
        