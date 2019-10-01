<?php

namespace Modules\Department\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;
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
        $request->validate([
            'student_session'=>'required',
            'student_type'=>'required',
            'admission_no'=>'required'
        ]);
        $admission = headOfDepartment()->admissions()->create(['admission_no'=>$request->admission_no]);
        $student = $admission->student()->create([
            'first_name'=>'default',
            'last_name'=>'default',
            'phone'=>'default',
            'email'=>$admission->admission_no.'@poly.com',
            'password'=>Hash::make($admission->admission_no),
            'student_type_id' => $request->student_type,
            'student_session_id' => $request->student_session
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
    public function revokeAdmission($admission_id)
    {
        $admission = Admission::find($admission_id);
        if($admission->student->is_active == 1){
            $admission->student->is_active = 0;
        }else{
            $admission->student->is_active = 1;
        }
        $admission->student->save();
        
        $admission->student->update(['is_active'=>0]);

        session()->flash('message','Congratulation this admission is revoked successfully');

        return redirect()->route('department.admission.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($admission_id)
    {
        return view('department::department.admission.edit',['admission'=>Admission::find($admission_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $admission_id)
    {
        $admission = Admission::find($admission_id);
        $admission->update(['admission_no'=>$request->admission_no]);

        $student = $admission->student->update([
            'first_name'=>'default',
            'last_name'=>'default',
            'phone'=>'default',
            'email'=>$admission->admission_no.'@poly.com',
            'password'=>Hash::make($admission->admission_no),
            'student_type_id' => $request->student_type
        ]);

        session()->flash('message','Congratulation this admission is updated successfully and this student can logged in as student using '.$admission->admission_no.'@poly.com as his email and '.$admission->admission_no.' as his password');

        return redirect()->route('department.admission.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($admission_id)
    {
        $admission = Admission::find($admission_id);
        $admission->student->studentAccount->delete();
        $admission->student->delete();
        $admission->delete();

        session()->flash('message','Congratulation this admission is deleted successfully');

        return redirect()->route('department.admission.index');
    }
}
