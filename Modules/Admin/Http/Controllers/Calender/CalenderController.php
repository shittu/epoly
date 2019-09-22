<?php

namespace Modules\Admin\Http\Controllers\Calender;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\NewCalenderFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CalenderController extends AdminBaseController
{

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createCalender()
    {
        return view('admin::calender.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerCalender(NewCalenderFormRequest $request)
    {
        dd($request->all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function showCalender($calender_id)
    {
        return view('admin::calender.view');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editCalender($calender_id)
    {
        return view('admin::calender.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateCalender(NewCalenderFormRequest $request, $calender_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($calender_id)
    {
        //
    }
}
