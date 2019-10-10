<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseResultController extends HodBaseController
{
    public function index()
    {
        return view('department::department.course.result.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'course'=>'required'
        ]);
        $course = Course::find($request->course);
        $session = Session::find($request->session);
        $uploaded_result = LecturerCourseResultUpload::where([
            'lecturer_course_id'=>$course->currentCourseLecturer()->id,
            'session_id'=>$request->session,
        ])->first();
        if(blank($uploaded_result)){
            session()->flash('error',['The result of '.$course->code.' at '.$session->name.' is not yet uploaded']);
            return back();
        }
        session()->flash('message','The result of '.$course->code.' at '.$session->name);
        return redirect()->route('department.result.course.edit',[$uploaded_result->id]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function review($result_id)
    {
        return view('department::department.course.result.review',['result'=>LecturerCourseResultUpload::find($result_id)]);
    }
    public function editCourseResult($result_id)
    {
        return view('department::department.course.result.edit',['upload'=>LecturerCourseResultUpload::find($result_id)]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function amend($result_id)
    {
        return view('department::department.course.result.amend',['result'=>LecturerCourseResultUpload::find($result_id)]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function amendResult(Request $request,$result_id)
    {
        $request->validate(['marks'=>'required']);
        $upload = LecturerCourseResultUpload::find($result_id);
        $upload->update(['amended_by'=>$request->marks]);
        foreach($upload->results as $result){
            $result->computeGrade();
        }
        session()->flash('message','All the result is updated successfully');
        return back();
        
    }
}
