<?php

namespace App\Http\Controllers;

use App\Models\Glaze;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GlazeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Glaze::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('pages.dataga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dataga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'dept' => 'required',
            'shift' => 'required',
            'grub' => 'required',
            'spray' => 'required',
            'density' => 'required',
            'viscosity' => 'required',
            'weight' => 'required',
        ]);

        $data = new Glaze();
        $data->name = $request->name;
        $data->dept = $request->dept;
        $data->shift = $request->shift;
        $data->grub = $request->grub;
        $data->spray = $request->spray;
        $data->density = $request->density;
        $data->viscosity = $request->viscosity;
        $data->weight = $request->weight;
        $data->save();

        return redirect()->route('glaze.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Glaze  $glaze
     * @return \Illuminate\Http\Response
     */
    public function show(Glaze $glaze)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Glaze  $glaze
     * @return \Illuminate\Http\Response
     */
    public function edit(Glaze $glaze)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Glaze  $glaze
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Glaze $glaze)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Glaze  $glaze
     * @return \Illuminate\Http\Response
     */
    public function destroy(Glaze $glaze)
    {
        //
    }
}
