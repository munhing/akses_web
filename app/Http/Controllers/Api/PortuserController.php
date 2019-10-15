<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AksesScanService;
use App\Models\Portuser;

class PortuserController extends Controller
{
    /** @var  ActivePortuserRepository */
    private $akses;

    public function __construct(AksesScanService $akses)
    {
        $this->akses = $akses;
    }  

    public function getPortusers()
    {
        // need to add the photo url
        return Portuser::with('company')->get();
    }

    public function index()
    {
        return $this->akses->getActivePortusers();
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
