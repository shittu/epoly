<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\Level;
use Modules\Admin\Entities\Session;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class CourseRegistrationController extends StudentBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function availableCourses()
    {
    
        return view('student::course.registration.create',['courses'=>student()->currentLevelCourses()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerCourses(Request $request)
    {

        $courses = array_merge($request->course,$request->add);
        $dropCourses = $this->getCurrentSessionDropCourses($request->course);
        $session_registration = student()->sessionRegistrations()->firstOrCreate([
            'level_id'=>student()->level()->id,
            'session_id'=> currentSession()->id,
            'department_id'=> student()->admission->department->id
            ]);
        foreach ($courses as $course_id) {
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
        if(!empty($dropCourses)){
            foreach ($dropCourses as $course_id) {
                student()->dropCourses()->firstOrCreate([
                    'session_id'=>currentSession()->id,
                    'course_id'=>$course_id,
                    'status'=>1,
                ]);
            }
        }
        session()->flash('message', 'Congratulation all courses has been registered success fully');
        return redirect()->route('student.course.registration.courses.register.show');
    }
    
    public function getCurrentSessionDropCourses($courses)
    {
        $availableCourses = [];
        $dropCourses = [];
        foreach (student()->level()->currentLevelCourses as $course) {
            if(!in_array($course->id, $courses)){
                $dropCourses[] = $course->id;
            }
        }

    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('student::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function showCourses()
    {

        return view('student::course.registration.show',['courses'=>student()->currentRegisteredCourses()]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function results()
    {
        return view('student::course.result.result');
    }

    public function registeredCourses()
    {
        return view('student::course.result.courses');
    }
}
