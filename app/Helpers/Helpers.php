<?php

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
        $start = date('Y');
        $end = date('Y')+1;
        return $start.'/'.$end;
    }
}

if (!function_exists('logout_route')) {
    function logout_route()
    {
        switch (auth()->guard()) {
            
            case 'admin':
                $route = 'admin.auth.logout';
            break;

            case 'staff':
                $route = 'staff.auth.logout';
            break;
            
            case 'lecturer':
                $route = 'lecturer.auth.logout';
            break;

            case 'head_of_department':
                $route = 'department.hod.auth.logout';
            break;

            case 'directer':
                $route = 'college.directer.auth.logout';
            break;

            default:
                $route = 'student.auth.logout';
            break;
        }
        
        return $route;
    }
}

        