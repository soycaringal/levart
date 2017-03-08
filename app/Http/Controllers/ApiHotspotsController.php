<?php

namespace App\Http\Controllers;

use App\Hotspot;
use App\Address;
use Illuminate\Http\Request;

class ApiHotspotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotspots = Hotspot::all();

        return json_encode($hotspots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotspots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $address = new Address($input);
        $address->save();

        $hotspot = new Hotspot();
        $hotspot->name = $input['name'];

        $result = $address->hotspot()->save($hotspot);

        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function show(Hotspot $hotspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotspot $hotspot)
    {
        return view('admin.hotspots.edit', compact('hotspot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotspot $hotspot)
    {
        $hotspot->name = $request->name;
        $hotspot->rank = $request->rank;
        $hotspot->save();

        $result = $hotspot->address()->update($request->all());
        return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotspot $hotspot)
    {
        $hotspot->address()->delete();
        $result = $hotspot->delete();

        return json_encode($result);
    }
}
