<?php

namespace Modules\ExamOfficer\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class AdmissionController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examofficer::admission.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('examofficer::admission.create',['route'=>'exam.officer.student.admission.register']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'type'=>'required',
        ]);
        
        $admission = department()->generateNewAdmission($request->all());

        return redirect()->route('exam.officer.student.admission.edit',[$admission->id]);
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
        return view('examofficer::admission.edit',[
            'route'=>'exam.officer.student.admission.update',
            'admission'=>Admission::find($admission_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $admission_id)
    {
        
        Admission::find($admission_id)->updateThisAdmission($request->all());
    
        return back();
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
