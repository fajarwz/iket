<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;
use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

class ManagerDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $req_today_count                    = UserRequest::where('request_created_date', date('Y-m-d'))
        ->count();
        $req_not_finished_yet_today_count   = FollowedUpRequest::whereHas('user_request', function($query) {
            $query->where([
                ['request_created_date', '=', date('Y-m-d')],
                ['is_done',              '=', 'BELUM SELESAI']
            ]);
        })->count();

        // App\Referential::whereHas('certifications.users', function($query) use($user) {
        //     $query->where('users.id', $user->id);
        //  });
        $req_alltime_count                  = UserRequest::count();
        $req_not_finished_yet_alltime_count = FollowedUpRequest::where('is_done', 'BELUM SELESAI')->count();

        $req_today            = VerifiedRequest::whereHas('followed_up_request', function($query){
            $query->whereHas('user_request', function($query2){
                $query2->where('request_created_date', date('Y-m-d'));
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        // $req_not_finished_yet = FollowedUpRequest::where('is_done', 'BELUM SELESAI')
        $req_not_finished_yet = VerifiedRequest::whereHas('followed_up_request', function($query){
            $query->where('is_done', 'BELUM SELESAI');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        return view('pages.manager.dashboard', [
            'req_today_count'                   => $req_today_count,
            'req_not_finished_yet_today_count'  => $req_not_finished_yet_today_count,
            'req_alltime_count'                 => $req_alltime_count,
            'req_not_finished_yet_alltime_count'=> $req_not_finished_yet_today_count,
            'req_today'                         => $req_today,
            'req_not_finished_yet'              => $req_not_finished_yet
        ]);
    }
}
