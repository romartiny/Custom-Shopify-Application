<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    public function showAdminDashboard()
    {
        return view('adminboard');
    }

    public function showAdminLogs()
    {
        return view('adminlogs');
    }

    public function showThemeLogs()
    {
        return view('themelogs');
    }

    public function showImportantLogs()
    {
        return view('importantlogs');
    }

    public function showStaffLogs()
    {
        return view('stafflogs');
    }
}
