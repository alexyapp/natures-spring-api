<?php

namespace App\Http\Controllers\Api;

use App\Models\IslandGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\IslandGroup as IslandGroupResource;

class IslandGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function show(IslandGroup $islandGroup)
    {
        return new IslandGroupResource($islandGroup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(IslandGroup $islandGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IslandGroup $islandGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(IslandGroup $islandGroup)
    {
        //
    }
}
