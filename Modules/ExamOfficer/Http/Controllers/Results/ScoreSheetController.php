<?php

namespace Modules\ExamOfficer\Http\Controllers\Results;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Lecturer\Imports\UploadResult;
use Modules\Lecturer\Services\Result\DownloadScoreSheet;
use Modules\Lecturer\Services\Result\UploadScoreSheet;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class ScoreSheetController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function downloadIndex()
    {
        return view('examofficer::result.scoreSheet.download.index',['route'=>'exam.officer.result.scoresheet.download']);
    }
    
    public function uploadIndex()
    {
        return view('examofficer::result.scoreSheet.upload.index',['route'=>'exam.officer.result.scoresheet.upload']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function downloadScoreSheet(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'course'=>'required'
        ]);
        $scoreSheet = new DownloadScoreSheet($request->all());
        return $scoreSheet->downloadFile();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function uploadScoreSheet(Request $request)
    {
        $request->validate([
        'course' =>'required',
        'result'  => 'required',
        'session'  => 'required'
        ]);

        $result = new UploadScoreSheet($request->all());

        Excel::import(new UploadResult($result->uploadedBy()), $request->file('result'));

        session()->flash('message','Congratulation the result of all registered students is successfully uploaded');

        return back();
    }
}
