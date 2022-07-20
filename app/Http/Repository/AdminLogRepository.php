<?php

namespace App\Http\Repository;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class AdminLogRepository
{
    private $apiVer = '/admin/api/2022-07/';

    public function getAdminLogs($shop)
    {
        return $shop->api()->rest('GET', $this->apiVer . 'events.json',
            ["filter" => "Product,Order"],
        );
    }

    public function getThemeLogs($shop)
    {
        return $shop->api()->rest('GET', $this->apiVer . 'themes.json');
    }

    public function getImportantLogs($shop)
    {
        return $shop->api()->rest('GET', $this->apiVer . 'events.json',
            ["verb" => "create"]
        );
    }

    public function getStaffLogs($shop)
    {
        return $shop->api()->rest('GET', $this->apiVer . 'events.json',);
    }
}
