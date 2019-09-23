<?php

namespace Modules\Admin\Http\Controllers\Calender;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Admin\Events\NewAcademicCalenderEvent;
use Modules\Admin\Events\UpdateAcademicCalenderEvent;
use Modules\Admin\Http\Requests\NewCalenderFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Admin\Services\Calender\NewCalender as RegisterNewAcademicCalender;
use Modules\Admin\Services\Calender\UpdateCalender as UpdateNewAcademicCalender;
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
        $calender = new RegisterNewAcademicCalender($request->all());
        event(new NewAcademicCalenderEvent($calender->session));
        return redirect()->route('admin.calender.view',[str_replace('/','-',$calender->session)]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function viewCalender($session)
    {   
        return view('admin::calender.view',['session'=>$this->getThisSession($session)]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editCalender($session_id)
    {
        return view('admin::calender.edit', ['session'=>Session::find($session_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateCalender(NewCalenderFormRequest $request, $session_id)
    {
        $session = Session::find($session_id);
        new UpdateNewAcademicCalender($session, $request->all());
        event(new UpdateAcademicCalenderEvent($session));
        return redirect()->route('admin.calender.view',[str_replace('/','-',$session->name)]);
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

    public function getThisSession($session)
    {
        foreach (Session::where('name',str_replace('-','/',$session))->get() as $session) {
            return $session;
        }
    }
}
