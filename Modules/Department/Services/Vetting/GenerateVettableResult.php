<?php

namespace Modules\Department\Services\Vetting;

use Modules\Student\Entities\SessionRegistration;

/**
* this class will search for the vetting result using semester level and session
*/

class GenerateVettableResult
{
	protected $data;

	function __construct(array $data)
	{
		$this->data = $data;
		return $this->results = $this->searchVettableResult();
	}

	public function searchVettableResult()
	{
        return SessionRegistration::where(['department_id'=>headOfDepartment()->department->id,'session_id'=>$this->data['session'],'level_id'=>$this->data['level']])->paginate($this->data['paginate']);
        
	}

}