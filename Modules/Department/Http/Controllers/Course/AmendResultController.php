<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class AmendResultController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function review($result_id)
    {
        return view('department::department.course.result.review',['result'=>LecturerCourseResultUpload::find($result_id)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function amend()
    {
        return view('department::department.course.result.amend',['result'=>LecturerCourseResultUpload::find($result_id)]);
    }

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
    public function show($id)
    {
        return view('department::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('department::edit');
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
