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
		$this->data['session'] = $this->currentSession()->name;
		$this->session = $this->data['session'];
		new RegisterSemesterCalenders([1,2],$this->data);
	}

}