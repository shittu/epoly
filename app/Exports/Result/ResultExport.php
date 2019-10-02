<?php

namespace App\Exports\Result;

use Modules\Student\Entities\Result;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResultExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Result::all();
    }
}
