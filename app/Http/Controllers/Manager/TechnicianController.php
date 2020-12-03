<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;

use App\Http\Requests\Manager\ManAddTechRequest;

use DataTables;

class TechnicianController extends Controller
{
    public function json(){
        $data = User::where('role', 'TECHNICIAN');

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '
                <a 
                href="technician/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.manager.technician.list');
    }

    public function create() {
        return view('pages.manager.technician.create');
    }

    public function store(ManAddTechRequest $request) {
        $data               = $request->except('confirm_password');
        $data['password']   = Hash::make($data['password']);
        $data['role']       = 'TECHNICIAN';
        $data['dept_code']  = '3300';
        
        if(User::create($data)) {
            $request->session()->flash('alert-success-add', 'Teknisi berhasil ditambahkan');
        }
        return redirect()->route('technician.index');
    }

    public function show($id) {

    }

    public function edit($id) {
        $item           = User::findOrFail($id);

        return view('pages.manager.technician.edit', [
            'item'          => $item
        ]);
    }

    public function update(ManAddTechRequest $request, $id) {
        $data = $request->except('username');
        $item = User::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success-update', 'User berhasil diupdate');
        }
        
        return redirect()->route('technician.index');
    }

    public function destroy($id) {
        
    }
}
