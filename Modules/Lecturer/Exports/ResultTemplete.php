<?php

namespace Modules\Lecturer\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

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
    
    // public function view(): View
    // {
    //     return view('exports.invoices', [
    //         'invoices' => Invoice::all()
    //     ]);
    // }

}
