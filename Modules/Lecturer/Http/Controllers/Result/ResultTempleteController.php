<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Jobs\Result\DownloadResultSheetJob;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultTempleteController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.templete.index');
    }

    public function downloadTemplete(Request $request) 
    {
        $request->validate(['course_id'=>'required']);
        $course = Course::find($request->course_id);
        $download = (new DownloadResultSheetJob($course))->delay(Carbon::now()->addSeconds(60));
        dispatch($download);
     
        session()->flash('message','Your request of downloading '.$course->code.' for '.currentSession().' session '.$course->semester->name.' is recieved and its on processing you will see the sheet in your download folder in the next 60 seconds thanks');
        return back();
    }
}
