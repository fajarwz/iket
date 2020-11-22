<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;

class TechnicianDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $req_today      = UserRequest::where('request_created_date', date('Y-m-d'))->count();
        $req_alltime    = UserRequest::count();

        return view('pages.technician.dashboard', [
            'req_today'     => $req_today,
            'req_alltime'   => $req_alltime 
        ]);
    }
}
