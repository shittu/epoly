<?php

namespace Modules\ExamOfficer\Http\Controllers\Graduation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class GraduationController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examofficer::graduation.index',['department'=>examOfficer()->department,'route'=>'exam.officer.graduation.search']);
    }

    
    public function search(Request $request)
    {
        $request->validate(['session'=>'required']);
        $session = Session::find($request->session);
        return view('examofficer::graduation.graduates',['session'=>$session,'graduates'=>$session->graduates()]);
    }

}
