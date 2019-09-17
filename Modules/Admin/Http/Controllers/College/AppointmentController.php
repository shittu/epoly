<?php

namespace Modules\Admin\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
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

    public function registerHeadOfDepartment(Request $request)
    {
        $errors = [];
        $request->validate([
            'staffID'=>'required',
            'appointment_date'=>'required'
        ]);
        if(session('confirm')){
            $staff = session('confirm');
            session()->forget('confirm');
            if(session('staffID') != $request->staffID){
                $errors[] = 'Sorry please be specific the initial request staffID is different with the confirmation request staffID';
            }
            if(session('appointment_date') != $request->appointment_date){
                $errors[] = 'Sorry please be specific the initial request appointment date is different with the confirmation request appointment date';
            }
            if(empty($errors)){
                //revoke the previouse HOD previllages of the department activities
                if($staff->department->headOfDepartments->last()){
                    $current_hod = $staff->department->headOfDepartments->last();
                    $current_hod->update(['is_active'=>0,'to'=>$request->appointment_date]);
                }

                $staff->headOfDepartment()->create([
                    'email'=>$staff->email,
                    'password'=>$staff->password,
                    'admin_id'=>admin()->id,
                    'department_id' => $staff->department->id,
                    'from'=> $request->appointment_date
                ]);
                session()->flash('message','Congratulation the head of department appointment is registered successfully and all previllages of the department are revoked from the former head of the department and now '.$staff->first_name.' '. $staff->last_name.' has access to them');
                return back();
            }else{
                session()->flash('error',$errors);
            }
            
        }else{
            
            $staff = $this->findStaff($request->staffID);
            if(!$staff){
                $errors[] = 'This StaffID does not exist in our record';
            }
            $current_hod = $staff->department->headOfDepartments->last();

            if($current_hod){
                if($current_hod->staff_id == $staff->id){
                    $errors[] = 'This StaffID staff can not be appointed as HOD because he is already a HOD of the department';
                }
            }
            if(strtotime($staff->employed_at) >= strtotime($request->appointment_date)){
                $errors[] = 'Invalid date of appointment';
            }
            if($staff && $staff->staffCategory->id != 1){
                $errors[] = 'Sorry this staff is non academic staff he dont have access to be appointed as head of the academic department';
            }

            if(empty($errors)){
                session(['confirm'=>$staff,'staffID'=>$request->staffID,'appointment_date'=>$request->appointment_date]);
                session()->flash('message','Please note that staff of this Biodata First Name : '.$staff->first_name.' Last Name : '.$staff->last_name. ' Gender : '.$staff->profile->gender->name.' is going to be the Head of '.$staff->department->name.' Department');
            }else{
                session()->flash('error',$errors);
            }
        }
        return back()->withInput($request->all());
    }

    public function findStaff($staffID)
    {
        $staff = null;
        foreach (Staff::where('staffID',$staffID)->get() as $this_staff) {
            $staff = $this_staff;
        }
        return $staff;
    }
}
