<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Activity;
use App\Address;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();

        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::pluck('name', 'id');

        return view('admin.destinations.create', compact('activities'));
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

        $destination = new Destination();
        $destination->activity_id = $input['activity_id'];
        $destination->guide = $input['guide'];
        $destination->content = $input['content'];
        $destination->rank = $input['rank'];

        $address->destination()->save($destination);

        return redirect(route('destinations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $destination->activities = Activity::pluck('name', 'id');
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $destination->activity_id = $request->activity_id;
        $destination->guide = $request->guide;
        $destination->content = $request->content;
        $destination->rank = $request->rank;
        $destination->save();

        $destination->address()->update($request->all());
        return redirect(route('destinations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->address()->delete();
        $destination->delete();

        return redirect(route('destinations.index'));
    }
}
