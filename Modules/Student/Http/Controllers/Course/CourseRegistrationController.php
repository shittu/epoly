<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $level = Level::where('name',student()->level())->first();
        return view('student::course.registration.create',['courses'=>$level->courses]);
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
        $courses = $request->course;
        foreach ($courses as $course_id) {
            student()->studentCourses()->firstOrCreate([
                'course_id'=>$course_id,
                'level_id'=>Level::where('name',student()->level())->first()->id,
                'session_id'=> Session::where('name',currentSession())->first()->id
            ]);
        }
        session()->flash('message', 'Congratulation all courses has been registered success fully');
        return redirect()->route('student.course.registration.courses.register.show');
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
    public function destroy($id)
    {
        //
    }
}
