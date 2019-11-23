<?php

use Modules\Admin\Entities\Session;

if (!function_exists('logout_route')) {
    function logout_route()
    {
        if(auth()->guard('admin')->check()){
            $route = 'admin.auth.logout';
        }elseif (auth()->guard('staff')->check()) {
            $route = 'staff.auth.logout';
        }elseif (auth()->guard('lecturer')->check()) {
            $route = 'lecturer.auth.logout';
        }elseif (auth()->guard('head_of_department')->check()) {
            $route = 'department.hod.auth.logout';
        }elseif (auth()->guard('directer')->check()) {
            $route = 'college.directer.auth.logout';
        }elseif(auth()->guard('exam_officer')->check()){
            $route = 'exam.officer.auth.logout';
        }else{
            $route = 'student.auth.logout';
        }
        return $route;
    }
}

if (!function_exists('storage_url')) {
    function storage_url($url)
    {
        return blank($url) ? $url: Storage::url($url);
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        $admin = null;
        if(auth()->guard('admin')->check()){
            $admin = auth()->guard('admin')->user();
        }
        return $admin;
    }
}

if (!function_exists('staff')) {
    function staff()
    {
        $staff = null;
        if(auth()->guard('staff')->check()){
            $staff = auth()->guard('staff')->user();
        }
        return $staff;
    }
}

if (!function_exists('examOfficer')) {
    function examOfficer()
    {
        $examOfficer = null;
        if(auth()->guard('exam_officer')->check()){
            $examOfficer = auth()->guard('exam_officer')->user();
        }
        return $examOfficer;
    }
}

if (!function_exists('student')) {
    function student()
    {
        $student = null;
        if(auth()->guard('student')->check()){
            $student = auth()->guard('student')->user();
        }
        return $student;
    }
}

if (!function_exists('lecturer')) {
    function lecturer()
    {
        $lecturer = null;
        if(auth()->guard('lecturer')->check()){
            $lecturer = auth()->guard('lecturer')->user();
        }
        return $lecturer;
    }
}


if (!function_exists('directer')) {
    function headOfDepartment()
    {
        $headOfDepartment = null;
        if(auth()->guard('head_of_department')->check()){
            $headOfDepartment = auth()->guard('head_of_department')->user();
        }
        return $headOfDepartment;
    }
}

if (!function_exists('directer')) {
    function directer()
    {
        $directer = null;
        if(auth()->guard('directer')->check()){
            $directer = auth()->guard('directer')->user();
        }
        return $directer;
    }
}

if (!function_exists('currentSession')) {
    function currentSession()
    { 
        // $start = date('Y')-1;
        // $end = date('Y');
        // $session = null;
        // foreach(Session::where('name',$start.'/'.$end)->get() as $current_session){
        //     $session = $current_session;
        // }
        return Session::find(3);
    }
}

if (!function_exists('lastSession')) {
    function lastSession()
    {    
        return Session::find(currentSession()->id-1);
    }
}



        