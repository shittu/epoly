<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentExamOfficerController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.examOfficer.index',
            ['examOfficers'=>headOfDepartment()->department->examOfficers->where('is_active',1)]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function revokeExamOfficer($exam_officer_id)
    {
        //
    }

}
