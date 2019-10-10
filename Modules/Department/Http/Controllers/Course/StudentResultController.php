<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Result;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class StudentResultController extends HodBaseController
{
    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    
    public function edit($result_id)
    {
        return view('department::department.course.result.student.edit',['result'=>Result::find($result_id)]);
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

}
