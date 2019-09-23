<?php
namespace Modules\Admin\Services\Calender;

use Modules\Department\Entities\Semester;

trait UpdateSubSemesterCalenders

{
	public function updateNewSemesterExamMarkingCalender(Semester $semester)
    {
    	$calender = null;
    	if($semester->id == 1){
            $semester->calender->markingCalender->update([
            	'start'=>$this->data['first_semester_exam_marking_start'],
            	'end'=>$this->data['first_semester_exam_marking_end']
            ]);
    	}else{
            $semester->calender->markingCalender->update([
            	'start'=>$this->data['second_semester_exam_marking_start'],
            	'end'=>$this->data['second_semester_exam_marking_end']
            ]);
    	}
    	return $semester->markingCalender->calender;
    }

    public function updateNewSemseterCourseAllocationCalender(Semester $semester)
    {
    	$calender = null;
    	if($semester->id == 1){
            $semester->calender->courseAllocationCalender->update([
            	'start'=>$this->data['first_semester_course_allocatiion_start'],
            	'end'=>$this->data['first_semester_course_allocatiion_end']
            ]);
    	}else{
            $semester->calender->courseAllocationCalender->update([
            	'start'=>$this->data['second_semester_course_allocation_start'],
            	'end'=>$this->data['second_semester_course_allocation_end']
            ]);
    	}
    	return $semester->calender->courseAllocationCalender;
    }

    public function updateNewSemseterResultUploadCalender(Semester $semester)
    {
    	$calender = null;
    	if($semester->id == 1){
            $semester->calender->uploadResultCalender->update([
            	'start'=>$this->data['first_semester_result_upload_start'],
            	'end'=>$this->data['first_semester_result_upload_end']
            ]);
    	}else{
            $semester->calender->uploadResultCalender->update([
            	'start'=>$this->data['second_semester_result_upload_start'],
            	'end'=>$this->data['second_semester_result_upload_end']
            ]);
    	}
    	return $semester->calender->uploadResultCalender;
    }
    public function updateNewSemesterExamCalender(Semester $semester)
    {
    	$calender = null;
    	if($semester->id == 1){
            $semester->calender->examCalender->update([
            	'start'=>$this->data['first_semester_exam_start'],
            	'end'=>$this->data['first_semester_exam_end']
            ]);
    	}else{
            $semester->calender->examCalender->update([
            	'start'=>$this->data['second_semester_exam_start'],
            	'end'=>$this->data['second_semester_exam_end']
            ]);
    	}
    	return $semester->calender->examCalender;
    }
    public function updateNewSemesterLectureCalender(Semester $semester)
    {
    	$calender = null;
    	if($semester->id == 1){
            $semester->calender->lectureCalender->update([
            	'start'=>$this->data['first_semester_lecture_start'],
            	'end'=>$this->data['first_semester_lecture_end']
            ]);
    	}else{
            $semester->calender->lectureCalender->update([
            	'start'=>$this->data['second_semester_lecture_start'],
            	'end'=>$this->data['second_semester_lecture_end']
            ]);
    	}
    	return $semester->calender->lectureCalender;
    }
}