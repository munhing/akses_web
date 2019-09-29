<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AksesScanService;

class ScanController extends Controller
{
    private $akses;

    public function __construct(AksesScanService $akses)
    {
        $this->akses = $akses;
    }
    

    public function scan(Request $request)
    {
        // receive QRcode as teh $request
        // return $request;
        // filter qrcode to separate type and uuid
        // $scanInfo = $this->getScanInfo($request['qrcode']);
        return $request['uuid'];
    }

    public function getScanInfo($qrcode)
    {
        $array = explode('&', $request['']);
        return $scanInfo;
    }
}
