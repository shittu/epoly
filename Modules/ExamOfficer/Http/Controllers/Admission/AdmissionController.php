<?php

namespace Modules\ExamOfficer\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
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
        $data = $request->all();
        $admission = examOfficer()->admissions()->create([
            'admission_no'=>examOfficer()->department->generateAdmissionNo($data)]);
        $data['admission_no'] = $admission->admission_no;
        $student = $admission->student()->create([
            'first_name'=>'',
            'last_name'=>'',
            'phone'=>'',
            'user_name'=>$admission->admission_no,
            'email'=>$admission->admission_no.'@sospoly.com',
            'password'=>Hash::make($admission->admission_no),
            'student_type_id' => $request->type,
            'student_session_id' => $request->session
        ]);
        $student->studentAccount()->create([]);
        examOfficer()->department->updateDepartmentSessionAdmissionCounter($data);
        session()->flash('message','Congratulation this admission is registered successfully and this student can logged in as student using '.$admission->admission_no.'@poly.com as his email and '.$admission->admission_no.' as his password');

        return redirect()->route('department.admission.edit',[$admission->id]);
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
        return view('examofficer::admission.edit',['admission'=>Admission::find($admission_id)]);
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
        $session = currentSession();
        $data = $request->all();
        if($data['type'] != $admission->typeNo() || $data['session'] != $admission->sessionNo()){
            //reserve the current admission number
            examOfficer()->department->reservedDepartmentSessionAdmissions()->firstOrCreate([
                    'session_id'=>$session->id,
                    'student_session_id'=>$data['session'],
                    'student_type_id'=>$data['type'],
                    'admission_no' => $admission->admission_no
                ]);
            //generate another admission number and update admission with the new admission no
            $admission->update([
                'admission_no'=>examOfficer()->department->generateAdmissionNo($data)
            ]);
        }
        //update student information
        $student = $admission->student->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone'],
            'email'=>$admission->admission_no.'@sospoly.com',
            'password'=>Hash::make($admission->admission_no),
            'student_type_id' => $data['type'],
            'student_session_id' => $data['session'],
        ]);
        //update student account information
        $admission->student->studentAccount->update([
            'gender_id'=>$data['gender'],
            'tribe_id'=>$data['tribe'],
            'religion_id'=>$data['religion'],
        ]);
        session()->flash('message','Congratulation this admission is updated successfully and this student can logged in as student using '.$admission->admission_no.'@poly.com as his email and '.$admission->admission_no.' as his password');

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
