<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Session;
class AddAndDropCourseController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //register all the add courses
        foreach ($request->add as $course_id) {
            $course = Course::find($course_id);
            $semester_registration = $session_registration
            ->semesterRegistrations()
            ->firstOrCreate(['semester_id'=>$course->semester->id]);
            $course_registration = $semester_registration->courseRegistrations()->firstOrCreate([
                'course_id'=>$course_id,
                'session_id'=> currentSession()->id,
            ]);
            $course_registration->result()->firstOrCreate([]);
        }
        
        //drop all the drop courses and delete them from the
        foreach ($this->getThisStudentCurrentCourseRegistration() as $courseRegistration) {
            if(in_array($courseRegistration->course_id, $request->drop)){
                //add course to the dropped courses
                student()->dropCourses()->firstOrCreate(['session_id'=>currentSession()->id,'course_id'=>$courseRegistration->course_id,'status'=>1]);
                //delete course registration result templete
                $courseRegistration->result->delete();
                //delete the course registrations
                $courseRegistration->delete();
            }
        }

        session()->flash('message', 'Congratulation all courses has been added and dropped success fully');
        return redirect()->route('student.course.registration.courses.register.show');
    }
    
    public function getThisStudentCurrentCourseRegistration()
    {
        $courseRegistrations = [];
        foreach (student()->sessionRegistrations->where('session_id',currentSession()->id) as $sessionRegistration) {
            foreach ($sessionRegistration->semesterRegistration as $semesterRegistration) {
                foreach ($sessionRegistration->courseRegistrations as $courseRegistration) {
                    $courseRegistrations[] = $courseRegistration;
                }
            }
        }
        return $courseRegistrations;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

    public function showRegisredAndCarryOverCourses()
    {
        return view('student::course.registration.add_or_drop_course',['registrations'=>student()->sessionRegistrations->where('session_id',currentSession()->id)]);
    }
}
