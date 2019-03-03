<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IslandGroup;
use App\Http\Resources\IslandGroup as IslandGroupResource;
use App\Models\Province;
use App\Http\Resources\Province as ProvinceResource;
use App\Models\City;
use App\Http\Resources\City as CityResource;

class LocationController extends Controller
{
    /**
     * Get all locations in the Philippines including the 3 island groups and all the provinces and cities that belong to it.
     */
    public function index()
    {
        return IslandGroupResource::collection(IslandGroup::all());
    }

    /**
     * Get all data of this island group including a list of provinces and cities belonging to it.
     */
    public function islandGroup(IslandGroup $islandGroup)
    {
        return new IslandGroupResource($islandGroup);
    }

    /**
     * Get all data of this province including a list of cities belonging to it and the island group to which it belongs to.
     */
    public function province(IslandGroup $islandGroup, Province $province)
    {
        return new ProvinceResource($province);
    }

    /**
     * Get all data of this city including the province and island group to which it belongs to
     */
    public function city(IslandGroup $islandGroup, Province $province, City $city)
    {
        return new CityResource($city);
    }
}
