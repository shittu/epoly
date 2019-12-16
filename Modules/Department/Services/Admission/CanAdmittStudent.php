<?php
namespace Modules\Department\Services\Admission;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Services\Admission\FileUpload;

trait CanAdmittStudent

{
    use FileUpload;

	public function generateNewAdmission(array $data)
	{
		$admission = $this->registerStudentAdmission($data);

		session()->flash('message','Congratulation this admission is registered successfully and this student can logged in as student using '.$admission->admission_no.' as user name and '.$admission->admission_no.' as his password');
		return $admission;
	}

	public function registerStudentAdmission($data)
	{
		$admission = $this->admissions()->firstOrCreate([
            'admission_no'=>$data['admission_no'],
            'head_of_department_id'=>1,
            'session_id'=>currentSession()->id,
            'year'=> substr(currentSession()->name, 5)
        ]);
        $this->updateTheAdmissionCounter($admission->admission_no);
        $this->registerStudent($admission,$data);
        return $admission;
	}
    
	public function registerStudent($admission,$data)
	{
        //filter admission sesstion and admission type and put the in the array of data
        $data['session'] = substr($data['admission_no'], 4,1);
        $data['type'] = substr($data['admission_no'], 5,1);

		$student = $admission->student()->firstOrCreate([
            'first_name'=> $data['first_name'],
            'last_name'=> $data['last_name'],
            'middle_name'=> $data['middle_name'],
            'user_name'=>$data['admission_no'],
            'email'=> $data['email'],
            'phone'=>$data['phone'],
            'student_session_id'=> $this->studentSessionId($data),
            'student_type_id'=>  $this->studentTypeId($data),
            'password'=> Hash::make($admission->admission_no),
        ]);

        $this->registerStudentAccount($student,$data);
	}

	public function registerStudentAccount($student, $data)
	{
		$account =$student->studentAccount()->firstOrCreate([
            'gender_id'=>$data['gender'],
            'religion_id'=>$data['religion'],
            'lga_id'=>$data['lga'],
            'address'=>$data['address'],
        ]);

        $image = $this->storeFile($data['picture'],department()->name.'/Admission/Profile');
        $account->update(['picture'=>$image]);
	}

}