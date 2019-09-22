<?php
namespace Modules\Admin\Services\Calender;

/**
* 
*/
class NewCalender
{
	public $data;
    public $session;

	function __construct(array $data)
	{
		$this->data = $data;
		$this->data['session'] = $this->getCurrentSession();
		$this->session = $this->data['session'];
		new RegisterSemesterCalenders([1,2],$this->data);
	}

	public function getCurrentSession()
	{
		$start = date('Y');
		$end = date('Y')+1;
		return $start.'/'.$end;
	}

}