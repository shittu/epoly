<?php
namespace Modules\Admin\Services\Calender;

/**
* 
*/
class NewCalender
{
	public $data;

	function __construct(array $data)
	{
		$this->data = $data;
		$this->data['session'] = $this->getCurrentSession();
		new RegisterSemesterCalenders([1,2],$this->data);
	}

	public function getCurrentSession()
	{
		return "date('Y').'/'.date('Y')+1";
	}

}