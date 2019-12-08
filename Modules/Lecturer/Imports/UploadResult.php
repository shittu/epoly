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
        $student = $this->getStudent(substr($results[2],0,9));
        // $result = Result::find($results[3]);
        if($student){
            $result = $student->getCurrentSessionCourseRegistrationResult($this->data);
            if($result){
                $result->update(['lecturer_course_result_upload_id'=>$this->uploaded_by->id,'ca'=>$results[3],'exam'=>$results[4]]);
                $result->computeGrade();
            }else{
                session('error',['Sorry this file has passed its name and current session verification, but its content does not matches the current session registration, this happen due to the the previous session result file renamed to the current session result file if this problem persist please download another file and upload again']);
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
