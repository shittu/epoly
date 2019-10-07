<?php

namespace Modules\Department\Statistics\Result\Lecturer;

use Modules\Admin\Entities\Session;
use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class CourseChart extends Chart
{

	public $course;
	public $session;

	public function __construct(array, $data)
	{
		$this->course = $data['course'];
		$this->session = $data['session'];
	}
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function createChart()
    {
        $this->labels($this->labels());
        $this->dataset($this->course->code.' Result of '.$this->session.' Session Report', 'Bar',$this->dataSets())->color($this->colors());
        return $this;
    }

    public function labels()
    {
    	return ['Pass','Fail'];
    }

    public function colors()
    {
    	return ['#6da242','red'];
    }

    public function dataSets()
    {
    	$pass = 0;
    	$fail = 0;
    	foreach (Session::find($this->session)->sessionRegistrations as $session_registration) {
    		foreach ($session_registration->sessionCourseRegistrations->where('course_id',$this->course)->get() as $course_registration) {
    			if($course_registration->result->remark->name == 'Pass'){
    				$pass++;
    			}else{
    				$fail++;
    			}
    		}
    	}
    	return [$pass,$fail];
    }
}
