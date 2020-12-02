<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;
use App\Models\Department;
use App\Models\Computer;
use App\Models\BreakType;

use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

use App\Http\Requests\User\RequestRequest;

use Illuminate\Support\Facades\Auth;

use PDF;
use DataTables;

class RequestController extends Controller
{
    public function json(){
        $data = UserRequest::where('client_id', Auth::user()->id)->with([
            'user.department', 'computer', 'break_type'
        ]);

        return DataTables::of($data)
        ->addColumn('action', function($data){
               $btn = '<a 
                href="request/print/'.$data->id.'" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-print"></i>&nbsp;&nbsp;Print
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.user.request.list');
    }

    public function create() {
        $departments    = Department::all();
        $computers      = Computer::all();
        $break_types    = BreakType::all();

        return view('pages.user.request.create', [
            'departments'   => $departments,
            'computers'     => $computers,
            'break_types'   => $break_types
        ]);
    }

    public function store(RequestRequest $request) {
        $data = $request->except(['client_name','dept_code']);

        // get latest request id and store it to requests table 
        $latest_request_id = UserRequest::create($data)->id;

        if($latest_request_id != null){
            // store latest request id to followed up requests table 
            $latest_followed_up_request_id = FollowedUpRequest::create([
                                            'request_id'    => $latest_request_id
                                            ])->id;

            if($latest_followed_up_request_id != null) {
                // store latest followed up request id to verified requests table and set it to BELUM TTD
                $store_it_to_verified_req = VerifiedRequest::create([
                    'followed_up_request_id'    => $latest_followed_up_request_id 
                ]);

                if($store_it_to_verified_req) {
                    $request->session()->flash('alert-success-add', 'Request berhasil ditambahkan');   
                }
            }
        }

        return redirect()->route('user.request'); 
    }

    public function printPreview($id) {
        $item   = UserRequest::findOrFail($id);

        $pdf = PDF::loadView('pages.user.request.print', [
            'item'  =>  $item 
        ]);
        return $pdf->stream();
    }
}
