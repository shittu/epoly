<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Imports\UploadResult;
use Modules\Lecturer\Services\Result\UploadScoreSheet;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultUploadController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.upload.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $request->validate([
        'course' =>'required',
        'result'  => 'required',
        'session'  => 'required'
        ]);

        $course = Course::find($request->course);
        $result = new UploadScoreSheet($request->all());
        Excel::import(new UploadResult($result->uploadedBy()), $request->file('result'));

        session()->flash('message','Congratulation '.currentSession()->name.' result of '.$course->code.' is successfully uploaded to all registered students');

        return back();
    }

    
}
