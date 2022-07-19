<?php

namespace App\Http\Repository;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class AdminLogRepository
{
    public function getAdminLogs($shop)
    {
        return $shop->api()->rest('GET', '/admin/api/2022-07/events.json',
            ["filter" => "Product,Order"],
        );
    }

    public function getThemeLogs($shop)
    {
        return $shop->api()->rest('GET', '/admin/api/2022-07/themes.json');
    }

    public function getImportantLogs($shop)
    {
        return $shop->api()->rest('GET', '/admin/api/2022-07/events.json',
            ["verb" => "create"]
        );
    }

    public function getStaffLogs($shop)
    {
        return $shop->api()->rest('GET', '/admin/api/2022-07/events.json',
            ["verb" => "create"]
        );
    }
}
