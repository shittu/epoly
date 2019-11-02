<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentLecturerAppointmentController extends HodBaseController
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $request->validate(['appointment'=>'required']);
        headOfDepartment()->department->departmentalAppointments()->create(['appointment_id'=>$request->appointment,'lecturer_id'=>$request->lecturer_id]);
        session()->flash('message','The appointment is registered successfully');
        return back();
    }
}
