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