<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::department.course.create');
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
     * Show the form for editing the specified resource.
     * @param int $course_id
     * @return Response
     */
    public function edit($course_id)
    {
        return view('department::department.course.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $course_id
     * @return Response
     */
    public function update(Request $request, $course_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $course_id
     * @return Response
     */
    public function delete($course_id)
    {
        //
    }
}
