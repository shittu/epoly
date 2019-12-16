<?php

namespace Modules\ExamOfficer\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Student;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class StudentController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewBiodata($studentID)
    {
        return view('examofficer::student.biodata',['student'=>Student::find($studentID)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('examofficer::create');
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
        return view('examofficer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('examofficer::edit');
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
