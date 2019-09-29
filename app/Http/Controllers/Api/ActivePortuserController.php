<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AksesScanService;

class ActivePortuserController extends Controller
{
    /** @var  ActivePortuserRepository */
    private $akses;

    public function __construct(AksesScanService $akses)
    {
        $this->akses = $akses;
    }  

    public function index()
    {
        return $this->akses->getActivePortusers();
    }

    public function clockIn(Request $request)
    {
        return $this->akses->clockIn($request);
    }

    public function clockOut(Request $request)
    {
        return $this->akses->clockOut($request);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
