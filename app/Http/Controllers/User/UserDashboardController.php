<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;

use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $req_today          = UserRequest::where([
            'request_created_date'  => date('Y-m-d'),
            'client_id'             => Auth::user()->id
        ]);
        $req_today_count    = $req_today->count();
        $req_alltime_count  = UserRequest::where('client_id', Auth::user()->id)->count();

        $req_today_list     = $req_today
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        // $req_today      = UserRequest::whereHas('user_request', function($query){
        //     $query->where('request_created_date', date('Y-m-d'));
        // })
        // ->orderBy('created_at', 'desc')
        // ->paginate(3);

        return view('pages.user.dashboard', [
            'req_today_count'       => $req_today_count,
            'req_alltime_count'     => $req_alltime_count,
            'req_today_list'        => $req_today_list
        ]);
    }
}
