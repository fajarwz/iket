<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Computer;
use App\Models\BreakType;
use App\Models\User;

use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

use App\Http\Requests\User\RequestRequest;

use PDF;
use DataTables;

class FollowedUpRequestController extends Controller
{
    public function json(){
        $data = FollowedUpRequest::with([
            'user_request', 'user_request.break_type'
        ])->orderBy('created_at', 'desc');

        return DataTables::of($data)
        ->addColumn('action', function($data){
               $btn = '<a 
                href="f-up-request/show/'.$data->id.'" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-eye"></i>&nbsp;&nbsp;Lihat
                </a>
                <a 
                href="f-up-request/edit/'.$data->id.'" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.technician.followed_up_request.list');
    }

    public function show($id) {
        $item = FollowedUpRequest::findOrFail($id);

        return view('pages.technician.followed_up_request.show', [
            'item'  => $item 
        ]);
    }

    public function edit($id) {
        $item           = FollowedUpRequest::findOrFail($id);
        $technicians    = User::where('role', 'TECHNICIAN');

        return view('pages.technician.followed_up_request.edit', [
            'item'          => $item,
            'technicians'    => $technicians
        ]);
    }

    public function update(FollowedUpRequestRequest $request, $id) {

    }
}
