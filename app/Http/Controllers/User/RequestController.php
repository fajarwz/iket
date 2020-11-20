<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequest;
use App\Models\Department;
use App\Models\Computer;
use App\Models\BreakType;

use App\Http\Requests\User\RequestRequest;

class RequestController extends Controller
{
    public function index() {
        $items          = UserRequest::all();
        $departments    = Department::all();
        $computers      = Computer::all();
        $break_types    = BreakType::all();

        return view('pages.user.request-list', [
            'items'         => $items,
            'departments'   => $departments,
            'computers'     => $computers,
            'break_types'   => $break_types
        ]);
    }

    public function create() {
        $departments    = Department::all();
        $computers      = Computer::all();
        $break_types    = BreakType::all();

        return view('pages.user.request-create', [
            'departments'   => $departments,
            'computers'     => $computers,
            'break_types'   => $break_types
        ]);
    }

    public function store(RequestRequest $request) {
        $data = $request->all();

        UserRequest::create($data);
        return redirect()->route('user.request'); 
    }

    public function print() {
        return view('pages.user.request-print');
    }
}
