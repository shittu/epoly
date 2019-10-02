<?php

namespace Modules\Lecturer\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ResultTemplete implements FromCollection
{

	protected $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return collect($this->data);
    }

}
