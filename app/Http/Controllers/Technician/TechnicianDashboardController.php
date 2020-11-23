<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;
use App\Models\FollowedUpRequest;

class TechnicianDashboardController extends Controller
{
    // public function json(){
    //     $data = FollowedUpRequest::with([
    //         'user_request', 'user_request.break_type'
    //     ])
    //     ->where('is_done', null)
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(3);

    //     return DataTables::of($data)
    //     ->addColumn('action', function($data){
    //            $btn = '<a 
    //             href="f-up-request/show/'.$data->id.'" 
    //             class="btn btn-primary btn-sm mb-2" id="">
    //             <i class="fas fa-eye"></i>&nbsp;&nbsp;Lihat
    //             </a>
    //             <a 
    //             href="f-up-request/edit/'.$data->id.'" 
    //             class="btn btn-primary btn-sm mb-2" id="">
    //             <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
    //             </a>';

    //             return $btn;
    //     })
    //     ->make(true);
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $req_today_count      = UserRequest::where('request_created_date', date('Y-m-d'))->count();
        $req_alltime_count    = UserRequest::count();

        $req_today            = FollowedUpRequest::where('request_id->request_created_date', date('Y-m-d'))
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        $req_not_finished_yet = FollowedUpRequest::where('is_done', null)
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        return view('pages.technician.dashboard', [
            'req_today_count'       => $req_today_count,
            'req_alltime_count'     => $req_alltime_count,
            'req_today'             => $req_today,
            'req_not_finished_yet'  => $req_not_finished_yet
        ]);
    }
}
