<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\IslandGroup as IslandGroupResource;

class Province extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'island_group' => new IslandGroupResource($this->island_group),
            'cities' => CityResource::collection($this->cities)
        ];
    }
}
