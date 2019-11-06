<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AksesScanService;
use App\Models\Portuser;
use App\Models\Vehicle;

class ScanController extends Controller
{
    private $akses;

    public function __construct(AksesScanService $akses)
    {
        $this->akses = $akses;
    }
    

    public function scan(Request $request)
    {
        return $request;
        
        if(isset($request['type'])) {

            // if detected visitor
            if ($request['type'] == 1) {
                // get portuser
                return $this->akses->getPortuser($uuid);
            }

            // if detected vehicle
            if ($request['type'] == 2) {}

            // if detected visitor
            if ($request['type'] == 3) {}
        }

        return null;
    }

    public function getScanInfo($qrcode)
    {
        $array = explode('&', $request['']);
        return $scanInfo;
    }
}
