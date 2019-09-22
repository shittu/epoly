<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\ExamCalender;
use Modules\Admin\Entities\LectureCalender;
use Modules\Admin\Entities\MarkingCalender;
use Modules\Admin\Entities\UploadResultCalender;
use Modules\Admin\Entities\CourseAllocationCalender;

trait SubSemesterCalenders

{
	public function registerNewSemseterMarkingCalender($semster)
    {
    	$calender = null;
    	if($semester == 1){
            $calender = MarkingCalender::firstOrCreate([
            	'start'=>$this->data['first_semester_exam_marking_start'],
            	'start'=>$this->data['first_semester_exam_marking_end']
            ]);
    	}else{
            $calender = MarkingCalender::firstOrCreate([
            	'start'=>$this->data['second_semester_exam_marking_start'],
            	'start'=>$this->data['second_semester_exam_marking_end']
            ]);
    	}
    	return $calender;
    }

    public function registerNewSemseterCourseAllocationCalender($semster)
    {
    	$calender = null;
    	if($semester == 1){
            $calender = CourseAllocationCalender::firstOrCreate([
            	'start'=>$this->data['first_semester_course_allocation_start'],
            	'start'=>$this->data['first_semester_course_allocation_end']
            ]);
    	}else{
            $calender = CourseAllocationCalender::firstOrCreate([
            	'start'=>$this->data['second_semester_course_allocation_start'],
            	'start'=>$this->data['second_semester_course_allocation_end']
            ]);
    	}
    	return $calender;
    }

    public function registerNewSemseterResultUploadCalender($semster)
    {
    	$calender = null;
    	if($semester == 1){
            $calender = UploadResultCalender::firstOrCreate([
            	'start'=>$this->data['first_semester_exam_result_upload_start'],
            	'start'=>$this->data['first_semester_exam_result_upload_end']
            ]);
    	}else{
            $calender = UploadResultCalender::firstOrCreate([
            	'start'=>$this->data['second_semester_exam_result_upload_start'],
            	'start'=>$this->data['second_semester_exam_result_upload_end']
            ]);
    	}
    	return $calender;
    }
    public function registerNewSemesterExamCalender($semster)
    {
    	$calender = null;
    	if($semester == 1){
            $calender = ExamCalender::firstOrCreate([
            	'start'=>$this->data['first_semester_exam_start'],
            	'start'=>$this->data['first_semester_exam_end']
            ]);
    	}else{
            $calender = ExamCalender::firstOrCreate([
            	'start'=>$this->data['second_semester_exam_start'],
            	'start'=>$this->data['second_semester_exam_end']
            ]);
    	}
    	return $calender;
    }
    public function registerNewSemesterLectureCalender($semster)
    {
    	$calender = null;
    	if($semester == 1){
            $calender = LectureCalender::firstOrCreate([
            	'start'=>$this->data['first_semester_lecture_start'],
            	'start'=>$this->data['first_semester_lecture_end']
            ]);
    	}else{
            $calender = LectureCalender::firstOrCreate([
            	'start'=>$this->data['second_semester_lecture_start'],
            	'start'=>$this->data['second_semester_lecture_end']
            ]);
    	}
    	return $calender;
    }
}