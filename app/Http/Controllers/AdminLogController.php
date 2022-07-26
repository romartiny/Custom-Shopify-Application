<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Repository\AdminLogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogController extends Controller
{
    private $_adminLogRepository;

    public function __construct(AdminLogRepository $adminLogRepository)
    {
        $this->_adminLogRepository = $adminLogRepository;
    }

    public function authUser()
    {
        return Auth::user();
    }

    public function showAdminLogs()
    {
        $adminLogs = $this->_adminLogRepository->getAdminLogs($this->authUser());

        return view('adminLogs', [
            'adminLogs' => $adminLogs['body']['container']['events']
        ]);
    }

    public function showThemeLogs()
    {
        $themeLogs = $this->_adminLogRepository->getThemeLogs($this->authUser());

        return view('themeLogs', [
            'themeLogs' => $themeLogs['body']['container']['themes']
        ]);
    }

    public function showImportantLogs()
    {
        $importantLogs = $this->_adminLogRepository->getImportantLogs($this->authUser());

        return view('importantLogs', [
            'importantLogs' => $importantLogs['body']['container']['events']
        ]);
    }

    public function showStaffLogs()
    {
        $staffLogs = $this->_adminLogRepository->getStaffLogs($this->authUser());

        return view('staffLogs', [
            'staffLogs' => $staffLogs['body']['container']['events']
        ]);
    }
}
