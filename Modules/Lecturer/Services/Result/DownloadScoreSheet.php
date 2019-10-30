<?php
namespace Modules\Lecturer\Services\Result
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;

class DownloadScoreSheet
{
	
	function __construct(array $data)
	{
		$this->data = $data;
	}
    
    public function currentCourse()
    {
     	$this->course = Course::find($this->data['course_id']);
     	$this->downloadFile();
    }

    public function getFileHeader()
    {
     	return [
            'S/N',
            'NAME',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
    }

	public function getFileData()
	{
		$datas[] = $this->getFileHeader();

        foreach ($this->course->courseRegistrations->where('session_id',$this->data['session']) as $course_registration) {
            $counter = 0;
            //lets compare student department and lecturer allocated department
            if($course_registration->course->department->id == $course->department->id){
                $datas[] = [
                    'serial_no' => $counter++,
                    'name'=>$course_registration->semesterRegistration->sessionRegistration->student->first_name.' '.$course_registration->semesterRegistration->sessionRegistration->student->last_name,
                    'admission_no' => $course_registration->semesterRegistration->sessionRegistration->student->admission->admission_no,
                    'registration_id' => $course_registration->id,
                    'contenue_accessment'=> rand(1,40),
                    'examination'=> rand(1,60),
                ];
            }
        }
	}

	public function downloadFile()
	{
	    $this->currentData();
		return Excel::download(new ResultTemplete($this->getFileData()), $this->course->code.'_Result_Sheet_Templete.xlsx','Xlsx',$this->getFileHeader());
	}
}