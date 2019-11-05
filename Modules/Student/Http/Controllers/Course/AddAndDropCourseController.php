<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Session;
class AddAndDropCourseController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

    public function showRegisredAndCarryOverCourses()
    {
        return view('student::course.registration.add_or_drop_course',['registrations'=>student()->sessionRegistrations->where('session_id',currentSession()->id)]);
    }
}
