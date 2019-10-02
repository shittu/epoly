<?php

namespace Modules\Lecturer\Imports;

use Modules\Student\Entities\Result;
use Maatwebsite\Excel\Concerns\ToModel;

class UploadResult implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $results)
    {

        $result = Result::find($results[2]);
        if($result){
        	$result->update(['ca'=>$results[3],'exam'=>$results[4]]);
            $result->computeGrade();
        }
       
    }
}
