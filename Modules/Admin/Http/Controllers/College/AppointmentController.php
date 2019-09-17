<?php

namespace Modules\Admin\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AppointmentController extends AdminBaseController
{
    
    public function createHeadOfDepartment()
    {
        return view('admin::college.appointment.headof_department');
    }

    
    public function createCollegeDirecter()
    {
        return view('admin::college.appointment.college_directer');
    }
}
