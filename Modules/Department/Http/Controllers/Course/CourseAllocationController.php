<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseAllocationController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.courseAllocation.index');
    }

    public function register(Request $request)
    {
        foreach ($this->preparedAllocationDatas($request->all()) as $data) {
            //check if the data has course lecturer allocation
            dd($data);
            if($data['allocation']['course_master_lecturer_id']){
                $lecturer = Lecturer::find($data['allocation']['course_master_lecturer_id']);
                $lecturer->lecturerCourseAllocations()->create([
                    'lecturer_course_status_id'=>1,
                    'course_id'=>$data['allocation']['course_id'],
                    'departemnt_id'=>$data['allocation']['departemnt_id'],
                    'from'=>time()
                ]);
            }
            //check if the course has lecturer assistance
            if($data['allocation']['course_assistance_lecturer_id']){
                $lecturer = Lecturer::find($data['allocation']['course_assistance_lecturer_id']);
                $lecturer->lecturerCourseAllocations()->create([
                    'lecturer_course_status_id'=>2,
                    'course_id'=>$data['allocation']['course_id'],
                    'departemnt_id'=>$data['allocation']['departemnt_id'],
                    'from'=>time()
                ]);
            }
        }
        session()->flash('message','The course alocation is updated successfully');
        return redirect()->route('department.course.allocation.index');
    }
    
    public function preparedAllocationDatas(array $inputs)
    {
        $datas = [];
        $number_of_allocation_data = count($inputs) - 1;
        for ($i=0; $i < $number_of_allocation_data; $i++) { 
            $datas[] = $inputs[$i];
        }
        return $datas;
    }
    
}
