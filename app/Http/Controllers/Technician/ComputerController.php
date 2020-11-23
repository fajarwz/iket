<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Computer;

use App\Http\Requests\Technician\ComputerRequest;

use DataTables;

class ComputerController extends Controller
{
    public function json() {
        $data       = Computer::orderBy('ip', 'asc')->get();

        return DataTables::of($data)
        ->addColumn('action', function($data){
               $btn = '<a 
                href="computer/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.technician.computer.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.technician.computer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {
        $data = $request->all();
        
        Computer::create($data);
        return redirect()->route('computer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Computer::findOrFail($id);

        return view('pages.technician.computer.edit', [
            'item'  => $item 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, $id)
    {
        $data = $request->all();
        $item = Computer::findOrFail($id);

        $item->update($data);
        return redirect()->route('computer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
