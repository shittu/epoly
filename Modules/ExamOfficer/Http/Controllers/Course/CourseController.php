<?php

namespace Modules\ExamOfficer\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class CourseController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examofficer::course.index',['route'=>[
                'edit'=>'exam.officer.department.course.edit',
                'delete'=>'exam.officer.department.course.delete',
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('examofficer::course.create',['route'=>'exam.officer.department.course.register']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $course = department()->courses()->firstOrCreate([
            'code'=>$request->code,
            'title'=>$request->title,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        department()->departmentCourses()->create(['course_id'=>$course->id]);
        session()->flash('message','Course is created successfully');
        return redirect()->route('exam.officer.department.course.index',['route'=>[
                'edit'=>'exam.officer.department.course.edit',
                'delete'=>'exam.officer.department.course.delete',
            ]
        ]);
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
    public function edit($course_id)
    {
        return view('examofficer::course.edit',['route'=>'exam.officer.department.course.update','course'=>Course::find($course_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $course_id)
    {
        $course = Course::find($course_id);
        $course->update([
            'code'=>$request->code,
            'title'=>$request->title,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        session()->flash('message','Course is updated successfully');
        return back();
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
