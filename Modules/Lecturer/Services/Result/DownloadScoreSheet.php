<?php
namespace Modules\Lecturer\Services\Result;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Exports\ResultTemplete;
use Modules\Student\Entities\CourseRegistration;

class DownloadScoreSheet
{
	
	function __construct(array $data)
	{
		$this->data = $data;
	}
    
    public function currentCourse()
    {
     	$this->course = Course::find($this->data['course']);
    }

    public function currentSession()
    {
     	return Session::find($this->data['session']);
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
        foreach (CourseRegistration::where(['course_id'=>$this->data['course'],'session_id'=>$this->data['session']])->get() as $course_registration) {
            $counter = 0;
            $datas[] = [
                'serial_no' => $counter++,
                'name'=>$course_registration->semesterRegistration->sessionRegistration->student->first_name.' '.$course_registration->semesterRegistration->sessionRegistration->student->last_name,
                'admission_no' => $course_registration->semesterRegistration->sessionRegistration->student->admission->admission_no,
                'registration_id' => $course_registration->id,
                'contenue_accessment'=> rand(1,40),
                'examination'=> rand(1,60),
            ];
           
        }
        return $datas;
	}
	public function getFileName()
	{
		return $this->course->code.'_'.str_replace('/','_',$this->currentSession()->name).'_Result_Sheet.xlsx';
	}

	public function downloadFile()
	{
	    $this->currentCourse();
		return Excel::download(new ResultTemplete($this->getFileData()), $this->getFileName() ,'Xlsx',$this->getFileHeader());
	}
}