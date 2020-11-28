<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VerifiedRequest;

use App\Http\Requests\Manager\VerifiedRequestRequest;

use DataTables;

class VerifiedRequestController extends Controller
{
    public function json(){
        $data = VerifiedRequest::with([
            'followed_up_request', 'followed_up_request.user_request',
            'followed_up_request.user_request.break_type'
        ]);

        return DataTables::of($data)
        ->addColumn('action', function($data){
            if ($data->is_verified == 'SUDAH') {
                $result = '<form action="verified-request/verify/'.$data->id.'" method="post" class="d-inline">'
                .csrf_field().
                '<input type="hidden" name="_method" value="put" />
                <input type="hidden" name="is_verified" value="BELUM">
                    <button class="btn btn-success btn-sm">
                        <i class="fas fa-check"></i>
                    </button>
                </form>';
            } elseif($data->is_verified == 'BELUM') {
                $result = '<form action="verified-request/verify/'.$data->id.'" method="post" class="d-inline">'
                    .csrf_field().
                    '<input type="hidden" name="_method" value="put" />
                    <input type="hidden" name="is_verified" value="SUDAH">
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>';
            } else {
                $result = '';
            }
            return $result;
        })
        // ->rawColumns(['is_verified_with_link'])
        ->make(true);
    }
    
    public function index() {
        return view('pages.manager.verified_request.list');
    }

    public function verify(VerifiedRequestRequest $request, $id) {
        $data = $request->all();

        $item = VerifiedRequest::findOrFail($id);

        $item->update($data);
        return redirect()->route('manager.verified-request');
    }
}
