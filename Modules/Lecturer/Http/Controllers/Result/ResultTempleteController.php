<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Lecturer\Exports\ResultTemplete;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultTempleteController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.templete.index');
    }

    public function downloadTemplete(Request $request) 
    {
        $request->validate(['course_id'=>'required']);
        $course = Course::find($request->course_id);
        $datas = [];
        $headers = [
            'S/N',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        $datas[] = [
            'S/N',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        foreach ($course->studentCourses as $student_course) {
            $counter = 1;
            //lets compare student department and lecturer allocated department
            if($student_course->course->department->id == $course->department->id){
                $datas[] = [
                    'serial_no' => $counter,
                    'admission_no' => $student_course->student->admission->admission_no,
                    'registration_id' => $student_course->id,
                    'contenue_accessment'=> '--',
                    'examination'=> '--',
                ];
                $counter++;
            }
        }
        return Excel::download(new ResultTemplete($datas), $course->code.'_Result_Sheet_Templete.xlsx','Xlsx',$headers);
    }
}
