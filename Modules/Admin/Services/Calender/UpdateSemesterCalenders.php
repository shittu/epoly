<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;

/**
* this class initiate the calender's session and register various caleders
* of the two semesters
*/

class UpdateSemesterCalenders
{
	use UpdateSubSemesterCalenders;
    private $session;
    public $data;

	function __construct(Session $session, array $data)
	{
		$this->session = $session;
		$this->data = $data;
		$this->updateSemestersCalender();
	}

	public function updateCurrentSession()
	{
		$this->session->update([
			'name'=>$this->data['session'],
			'start'=>$this->data['session_start'],
			'end'=>$this->data['session_end'],
		]);
	}

    public function updateSemestersCalender()
    {
    	foreach ($this->session->calenders as $calender) {
    		$calender->update([
                'upload_result_calender_id' => $this->updateNewSemseterResultUploadCalender($calender->semester)->id,
                'semester_id' => $semester,
                'lecture_calender_id' => $this->updateNewSemesterLectureCalender($calender->semester)->id,
                'course_allocation_calender_id'=>$this->updateNewSemseterCourseAllocationCalender($calender->semester)->id,
                'marking_calender_id'=>$this->updateNewSemesterExamMarkingCalender($calender->semester)->id,
                'exam_calender_id' => $this->updateNewSemesterExamCalender($calender->semester)->id,
                'admin_id' => admin()->id,
    		]);
            if($calender->semester->id == 1){
                $calender->semester->update([
                    'start'=>$this->data['first_semester_start'],
                    'end'=>$this->data['first_semester_end'],
                ]);
            }else{
                $calender->semester->update([
                    'start'=>$this->data['second_semester_start'],
                    'end'=>$this->data['second_semester_end'],
                ]);
            }
    	}
    }

    
}