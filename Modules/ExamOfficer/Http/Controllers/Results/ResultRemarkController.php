<?php

namespace Modules\ExamOfficer\Http\Controllers\Results;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\SessionRegistration;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class ResultRemarkController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examofficer::result.student.remark.index',['route'=>'exam.officer.result.student.remark.registration.search']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        
        $request->validate(['remark'=>'required']);
        new MakeStudentRemark($request->all());
        session()->flash('message','The Exam Monitoring Committee Verdict is registered successfully');
        return back();
    }

    /**
     * Search available rcourse registration in storage.
     * @param Request $request
     * @return Response
     */
    public function searchRegistration(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'level'=>'required',
            'semester'=>'required'
        ]);
        $course_registrations = [];
        foreach(SessionRegistration::where(['department_id'=>examOfficer()->department->id,'session_id'=>$request->session,'level_id'=>$request->level])->get() as $session_registration){
            $course_registrations[] = $session_registration;
        }
        session(['course_registrations'=>$course_registrations]);
        return redirect()->route('exam.officer.result.student.remark.registration.view',[$request->semester]);
    }
    
    public function viewRegistration()
    {
        if(session('course_registrations')){
            return view('department::department.course.result.remark.registration',['registrations'=>session('course_registrations')]);
        }
        return redirect()->route('exam.officer.result.student.remark.index');
        
    }
}
