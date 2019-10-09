<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Modules\Lecturer\Imports\UploadResult;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
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
        'course_id' =>'required',
        'result'  => 'required',
        'session'  => 'required'
        ]);

        $course_lecturer = Course::find($request->course_id)->currentCourseLecturer();
        $course_upload_by = $course_lecturer->lecturerCourseResultUploads()->firstOrCreate(['session_id'=>$request->session]);

        Excel::import(new UploadResult($course_upload_by), $request->file('result'));

        session()->flash('message','Congratulation the result of all registered students is successfully uploaded');

        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('lecturer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('lecturer::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
