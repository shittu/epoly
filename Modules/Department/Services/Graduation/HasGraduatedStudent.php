<?php
namespace Modules\Department\Services\Graduation;

trait HasGraduatedStudent
{
	public function graduuates()
	{
		$graduates = [];
		foreach ($this->admissions() as $admission) {
			if($admission->student->graduated()){
				$graduates[] = $admission->stduent;
			}
		}
		$graduates;
	}

	public function admissions(Session $session)
	{
		return $this->admissions->where('session_id',$session->id);
	}




}