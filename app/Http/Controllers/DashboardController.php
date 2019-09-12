<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DashboardController extends AppBaseController
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('dashboard.index');
        // return 'Dashboard';

    }
}
