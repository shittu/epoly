<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\ExamCalender;
use Modules\Admin\Entities\LectureCalender;
use Modules\Admin\Entities\MarkingCalender;
use Modules\Admin\Entities\UploadResultCalender;
use Modules\Admin\Entities\CourseAllocationCalender;

trait SubSemesterCalenders

{
	public function registerNewSemesterExamMarkingCalender($semesterCalendar)
    {
    	$calender = null;
        if($semesterCalendar->semester_id == 1){
            $calender = $semesterCalendar->markingCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_exam_marking_start'],
            	'end'=>$this->data['first_semester_exam_marking_end']
            ]);
    	}else{
            $calender = $semesterCalendar->markingCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_exam_marking_start'],
            	'end'=>$this->data['second_semester_exam_marking_end']
            ]);
    	}
    	return $calender;
    }

    public function registerNewSemseterCourseAllocationCalender($semesterCalendar)
    {
    	$calender = null;
    	if($semesterCalendar->semester_id == 1){
            $calender = $semesterCalendar->courseAllocationCalender()->firstOrCreate([
            	'start'=>$this->data['first_semester_course_allocatiion_start'],
            	'end'=>$this->data['first_semester_course_allocatiion_end']
            ]);
    	}else{
            $calender = $semesterCalendar->courseAllocationCalender()->firstOrCreate([
            	'start'=>$this->data['second_semester_course_allocation_start'],
            	'end'=>$this->data['second_semester_course_allocation_end']
            ]);
    	}
    	return $calender;
    }

    public function registerNewSemseterResultUploadCalender($semesterCalendar)
    {
    	$calender = null;
    	if($semesterCalendar->semester_id == 1){
            $calender = $semesterCalendar->uploadResultCalender()->firstOrCreate([
            	'start'=>$this->data['first_semester_result_upload_start'],
            	'end'=>$this->data['first_semester_result_upload_end']
            ]);
    	}else{
            $calender = $semesterCalendar->uploadResultCalender()->firstOrCreate([
            	'start'=>$this->data['second_semester_result_upload_start'],
            	'end'=>$this->data['second_semester_result_upload_end']
            ]);
    	}
    	return $calender;
    }

    public function registerNewSemesterExamCalender($semesterCalendar)
    {
    	$calender = null;
    	if($semesterCalendar->semester_id == 1){
            $calender = $semesterCalendar->examCalender()->firstOrCreate([
            	'start'=>$this->data['first_semester_exam_start'],
            	'end'=>$this->data['first_semester_exam_end']
            ]);
    	}else{
            $calender = $semesterCalendar->examCalender()->firstOrCreate([
            	'start'=>$this->data['second_semester_exam_start'],
            	'end'=>$this->data['second_semester_exam_end']
            ]);
    	}
    	return $calender;
    }
    public function registerNewSemesterLectureCalender($semesterCalendar)
    {
    	$calender = null;
    	if($semesterCalendar->semester_id == 1){
            $calender = $semesterCalendar->lectureCalender()->firstOrCreate([
            	'start'=>$this->data['first_semester_lecture_start'],
            	'end'=>$this->data['first_semester_lecture_end']
            ]);
    	}else{
            $calender = $semesterCalendar->lectureCalender()->firstOrCreate([
            	'start'=>$this->data['second_semester_lecture_start'],
            	'end'=>$this->data['second_semester_lecture_end']
            ]);
    	}
    	return $calender;
    }
}