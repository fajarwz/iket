<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequest;

class RequestController extends Controller
{
    public function index(){
        $items = UserRequest::all();

        return view('pages.user.request-list', [
            'items' => $items
        ]);
    }
}
