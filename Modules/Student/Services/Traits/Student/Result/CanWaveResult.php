<?php
namespace Modules\Student\Services\Traits\Student\Result;

trait CanWaveResult
{
	public function waveThisResult()
	{
		$this->update(['waved_by'=>$this->waveThisResultWith(),'grade'=>'E']);
		$this->removeThisCourseIfExistFromDropCourses();
		$this->removeThisCourseIfExistFromRepeatCourses();
		$this->removeThisCourseIfExistFromReRegisterCourses();
	}

	public function waveThisResultWith()
    {
        return 40 - ($this->ca + $this->exam + $this->amended_by);
    }

    public function thisResultStudent()
    {
        return $this->courseRegistration->semesterRegistration->SessionRegistration->student;
    }

    public function removeThisCourseIfExistFromDropCourses()
    {
        foreach($this->thisResultStudent()->dropCourses->where(['course_id',$this->courseRegistration->course->id,'status'=>1]) as $dropCourse){
            $dropCourse->update(['status'=>0]);
        }
    }

    public function removeThisCourseIfExistFromRepeatCourses()
    {
        foreach($this->thisResultStudent()->repeatCourses->where(['course_id',$this->courseRegistration->course->id,'status'=>1]) as $repeatCourse){
            $repeatCourse->update(['status'=>0]);
        }
    }

    public function removeThisCourseIfExistFromReRegisterCourses()
    {
        foreach($this->thisResultStudent()->reRegisterCourses->where(['course_id',$this->courseRegistration->course->id,'status'=>1]) as $reRegister){
            $reRegister->update(['status'=>0]);
        }
    }
}