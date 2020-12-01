<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;

use App\Http\Requests\Technician\TechAddUserRequest;

use DataTables;

class UserController extends Controller
{
    public function json(){
        $data = User::with([
            'department'
        ]);

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '
                <a 
                href="user/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.technician.user.list');
    }

    public function create() {
        $departments = Department::all();

        return view('pages.technician.user.create', [
            'departments'   => $departments
        ]);
    }

    public function store(TechAddUserRequest $request) {
        $data               = $request->except('confirm_password');
        $data['password']   = Hash::make($data['password']);
        
        if(User::create($data)) {
            $request->session()->flash('alert-success-add', 'User berhasil ditambahkan');
        }
        return redirect()->route('user.index');
    }

    public function show($id) {

    }

    public function edit($id) {
        $item           = User::findOrFail($id);
        $departments    = Department::all();

        return view('pages.technician.user.edit', [
            'item'          => $item,
            'departments'   => $departments  
        ]);
    }

    public function update(TechAddUserRequest $request, $id) {
        $data = $request->except('username');
        $item = User::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success-update', 'User berhasil diupdate');
        }
        
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        
    }
}
