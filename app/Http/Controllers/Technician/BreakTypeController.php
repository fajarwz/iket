<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\BreakType;

use App\Http\Requests\Technician\BreakTypeRequest;

class BreakTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $items  = BreakType::all();
        return view('pages.technician.break_type.list', [
            'no'        => $no,
            'items'     => $items 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.technician.break_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreakTypeRequest $request)
    {
        $data = $request->all();
        
        if(BreakType::create($data)) {
            $request->session()->flash('alert-success-add', 'Jenis Kerusakan berhasil ditambahkan');
        }
        return redirect()->route('break-type.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
