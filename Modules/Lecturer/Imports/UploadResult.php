<?php

namespace Modules\Lecturer\Imports;

use Modules\Student\Entities\Result;
use Modules\Department\Entities\Admission;
use Maatwebsite\Excel\Concerns\ToModel;

class UploadResult implements ToModel
{
    public $uploaded_by;

    public function __construct($uploaded_by, $data)
    {
        $this->uploaded_by = $uploaded_by;
        $this->data = $data;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $results)
    {
        session(['failed'=>0,'uploaded'=>0]);
        $student = $this->getStudent(substr($results[2],0,9));
        // $result = Result::find($results[3]);
        if($student){

            $result = $student->getCurrentSessionCourseRegistrationResult($this->data);
            
            if($result){

                // $uploadCount = session('uploaded') + 1;
                // session(['failed'=>$uploadCount]);
                $result->update(['lecturer_course_result_upload_id'=>$this->uploaded_by->id,'ca'=>$results[4],'exam'=>$results[5]]);
                $result->computeGrade();
            }else{
                // $failedCount = session('failed') + 1;
                // session(['failed'=>$failedCount]);
            }
        }
       
    }

    public function getStudent($admission_no)
    {
        $student = null;
        foreach (Admission::where('admission_no',$admission_no)->get() as $admission) {
            if($admission){
                $student = $admission->student;
            }
        }
        return $student;
    }
}
