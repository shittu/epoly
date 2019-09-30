<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultUploadController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.upload.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $request->validate([
        'course_id' =>'required',
        'result'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('result')->getRealPath();
        dd($path);
        $data = Excel::load($path)->get();

        if($data->count() > 0){
            foreach($data->toArray() as $key => $value){

            }
        }
        foreach($value as $row){
            $insert_data[] = array(
            'CustomerName'  => $row['customer_name'],
            'Gender'   => $row['gender'],
            'Address'   => $row['address'],
            'City'    => $row['city'],
            'PostalCode'  => $row['postal_code'],
            'Country'   => $row['country']);
        }

        return back()->with('success', 'Excel Data Imported successfully.');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('lecturer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('lecturer::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
