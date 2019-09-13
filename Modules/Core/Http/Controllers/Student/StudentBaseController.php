<?php

namespace Modules\Core\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StudentBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
}
