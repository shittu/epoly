<?php

namespace Modules\Lecturer\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ResultChartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::statistics.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        dd($request->all());
    }

    public function view()
    {
        # code...
    }
}
