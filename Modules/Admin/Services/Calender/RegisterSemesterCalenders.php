<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;
use Modules\Admin\Services\Calender\SubSemesterCalenders;

/**
* this class initiate the calender's session and register various caleders
* of the two semesters
*/

class RegisterSemesterCalenders
{
	use SubSemesterCalenders;

    private $session;
    private $semesters;
    public $data;

	function __construct(array $semesters,array $data)
	{
		$this->semesters = $semesters;
		$this->data = $data;
		$this->session = $this->registerCurrentSession();
	}

	public function registerCurrentSession()
	{
		Session::firstOrCreate([
			'name'=>$this->data['session'],
			'start'=>$this->data['session_start'],
			'end'=>$this->data['session_end'],
		]);
	}

    public function registerSemestersCalender()
    {
    	foreach ($this->semesters as $semester) {
    		$this->session->calenders()->firstOrCreate([
                'upload_result_calender_id' => $this->registerNewSemseterResultUploadCalender($semester)->id,
                'semester_id' => $semester,
                'lecture_calender_id' => $this->registerNewSemesterLectureCalender($semester)->id,
                'course_allocation_calender_id'=>$this->registerNewSemseterCourseAllocationCalender($semester)->id,
                'marking_calender_id',
                'exam_calender_id' => $this->registerNewSemesterExamCalender($semester)->id,
                'admin_id' =>admin()->id,
    		]);
    	}
    }

    
}