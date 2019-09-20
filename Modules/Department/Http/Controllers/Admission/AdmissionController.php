<?php

namespace Modules\Department\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class AdmissionController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.admission.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::department.admission.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $admission = headOfDepartment()->admissions()->create(['admission_no'=>$request->admission_no]);

        $student = $admission->student()->create([
            'first_name'=>'default',
            'last_name'=>'default',
            'phone'=>'default',
            'email'=>$admission->admission_no.'@poly.com',
            'password'=>Hash::make($admission->admission_no),
            'student_type_id' => $request->student_type
        ]);

        $student->studentAccount()->create([]);

        session()->flash('message','Congratulation this admission is registered successfully and this student can logged in as student using '.$admission->admission_no.'@poly.com as his email and '.$admission->admission_no.' as his password');

        return redirect()->route('department.admission.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('department::department.admission.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('department::department.admission.edit');
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
    public function delete($id)
    {
        //
    }
}
