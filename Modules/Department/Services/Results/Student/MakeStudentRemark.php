<?php
namespace Modules\Department\Services\Results\Student;

use Modules\Student\Entities\SessionRegistration;

/**
* this class will the register the emc verdict remark for the student
*/
class MakeStudentRemark
{
	
	function __construct(array $data)
	{
		$this->data = $data;
		$this->verifyRemarkRegistration();
	}

	public function cancellationOfSemester()
	{
		foreach ($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration) {
	        $semester_registration->update(['cancelation_status'=>1]);
	        $semester_registration->semesterRegistrationRemarks()->firstOrCreate([
	            'remark_id' => $request->remark
	        ]);
	    }
	}

	public function willDraw()
	{
		$this->registration->student->update(['is_active'=>0]);
	}

	public function cancellationOfSession()
	{
		$this->registration->update(['cancelation_status'=>1]);
	}

	public function cancelationOfExam()
	{
		request()->validate(['course'=>'required']);
	    foreach($this->registration->semesterRegistrations->where('semester_id',$request->semster_id) as $semester_registration){
	        $course_registration = $semester_registration->courseRegistrations->where('course_id',$request->course)->first();
	        $course_registration->update(['cancelation_status'=>1]);
	        $course_registration->repeatCourserRegistration(['student_id'=>$course_registration->semesterRegistration->sessionRegistration->student->id]);
	    }
	}

	public function currentRegistration()
	{
		$this->registration = SessionRegistration::find($this->data['registration_id']);
	}

	public function verifyRemarkRegistration()
	{
		$this->currentRegistration();
		request()->validate(['remark'=>'required']);
	    switch ($this->data['remark']) {
	        case '1':
	            # semester cancelation
	            $this->cancellationOfSemester();
	            break;
	        
	        case '2':
	            # with draw
	            $this->willDraw();
	            break;
	        
	        case '3':
	            # session ccancelation
	            $this->cancellationOfSession();
	            break;
	        
	        case '4':
	            # exam cancelation
	            $this->cancelationOfExam();
	            break;
	        default:
	            //
	            break;
	    }
	    $this->registerTheRemark();
	}

        
    public function registerTheRemark()
    {
    	if($this->data['remark'] != 1){
            $registration->sessionRegistrationRemarks()->firstOrCreate([
                'remark_id'=>$request->remark,
                'semester_id'=>request()->route('semester_id')
            ]);
        }
    }
}