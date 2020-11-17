<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnicianDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.technician.dashboard');
    }
}
