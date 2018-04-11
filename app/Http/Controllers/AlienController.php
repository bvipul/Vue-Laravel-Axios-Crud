<?php

namespace App\Http\Controllers;

use App\Alien;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Alien::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alien = factory(Alien::class)->create();
        // dd($alien->jsonSerialize());
        return response($alien->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alien  $alien
     * @return \Illuminate\Http\Response
     */
    public function show(Alien $alien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alien  $alien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alien $alien)
    {
        $alien->color = $request->color;
        $alien->save();
        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alien  $alien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alien $alien)
    {
        
        $alien->delete();
        
        return response(null, Response::HTTP_OK);
    }
}
