<?php

namespace Modules\ExamOfficer\Http\Controllers\Graduation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        dd($request->all());
    }

}
