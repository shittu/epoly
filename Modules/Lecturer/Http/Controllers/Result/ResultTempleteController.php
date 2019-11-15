<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Exports\ResultTemplete;
use Modules\Lecturer\Jobs\Result\DownloadResultSheetJob;
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
            'NAME',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        $datas[] = [
            'S/N',
            'NAME',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        foreach ($course->courseRegistrations->where('session_id',$request->session) as $course_registration) {
            $counter = 0;
            $datas[] = [
                'serial_no' => $counter++,
                'name'=>$course_registration->semesterRegistration->sessionRegistration->student->first_name.' '.$course_registration->semesterRegistration->sessionRegistration->student->last_name,
                'admission_no' => $course_registration->semesterRegistration->sessionRegistration->student->admission->admission_no,
                'registration_id' => $course_registration->id,
                'contenue_accessment'=> rand(1,40),
                'examination'=> rand(1,60),
            ];
        }
        return Excel::download(new ResultTemplete($datas), $course->code.'_Result_Sheet_Templete.xlsx','Xlsx',$headers);
    }
}
