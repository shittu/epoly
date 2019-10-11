<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\SessionRegistration;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class BatingResultController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.result.bating.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'level'=>'required',
            'semester'=>'required'
        ]);
        $course_registrations = [];
        foreach(SessionRegistration::where(['department_id'=>headOfDepartment()->department->id,'session_id'=>$request->session,'level_id'=>$request->level])->get() as $session_registration){
            $course_registrations[] = $session_registration;
        }
        session(['course_registrations'=>$course_registrations]);
        return redirect()->route('department.result.course.bating.view',[$request->semester]);
        
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $registration_id)
    {
        //
    }

    public function edit($registration_id)
    {
        # code...
    }

    public function view()
    {
        if(session('course_registrations')){
            return view('department::department.course.result.bating.print',['registrations'=>session('course_registrations')]);
        }
        return redirect()->route('department.result.course.bating.index');
        
    }
}
