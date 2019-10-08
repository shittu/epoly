<?php

namespace Modules\Lecturer\Imports;

use Modules\Student\Entities\Result;
use Maatwebsite\Excel\Concerns\ToModel;

class UploadResult implements ToModel
{
    public $uploaded_by;

    public function __construct($uploaded_by)
    {
        $this->uploaded_by = $uploaded_by;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $results)
    {
        $result = Result::find($results[3]);
        if($result){
        	$result->update(['lecturer_course_result_upload_id'=>$this->uploaded_by->id,'ca'=>$results[4],'exam'=>$results[5]]);
            $result->computeGrade();
        }
       
    }
}
