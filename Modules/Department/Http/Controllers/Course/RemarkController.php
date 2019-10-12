<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\SessionRegistration;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class RemarkController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.result.remark.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $registration = SessionRegistration::find($request->registration_id);
        $request->validate(['remark'=>'required']);
        switch ($request->remark) {
            case '1':
                # semester cancelation
                foreach ($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration) {
                    $semester_registration->update(['cancelation_status'=>1]);
                }
                break;
            
            case '2':
                # with draw
                $registration->student->update(['is_active'=>0]);
                break;
            
            case '3':
                # session ccancelation
                $registration->update(['cancelation_status'=>1]);
                break;
            
            case '4':
                # exam cancelation
                $request->validate(['course'=>'required']);
                foreach($registration->semesterRegistrations->where('semester_id',$request->semster_id) as $semester_registration){
                    $course_registration = $semester_registration->courseRegistrations->where('course_id',$request->course)->first();
                    $course_registration->update(['cancelation_status'=>1]);
                }
                break;
            default:
                //
                break;
        }
        $registration->sessionRegistrationRemarks()->firstOrCreate([
            'remark_id'=>$request->remark,
            'semester_id'=>request()->route('semester_id')
        ]);
        session()->flash('message','The exam monitoring committee verdict is registered successfully');
        return back();
    }

    /**
     * Search available rcourse registration in storage.
     * @param Request $request
     * @return Response
     */
    public function searchRegistration(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'level'=>'required',
            'semester'=>'required'
        ]);
        $course_registrations = [];
        foreach(SessionRegistration::where(['department_id'=>headOfDepartment()->department->id,'session_id'=>$request->session,'level_id'=>$request->level])->get() as $session_registration){
            $course_registrations[] = $session_registration;
        }
        session(['course_registrations'=>$course_registrations]);
        return redirect()->route('department.result.remark.registration.view',[$request->semester]);
    }
    
    public function viewRegistration()
    {
        if(session('course_registrations')){
            return view('department::department.course.result.remark.registration',['registrations'=>session('course_registrations')]);
        }
        return redirect()->route('department.result.remark.index');
        
    }
    
}
