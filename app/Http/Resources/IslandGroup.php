<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\Province as ProvinceResource;

class IslandGroup extends JsonResource
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
            'provinces' => ProvinceResource::collection($this->provinces),
            'cities' => CityResource::collection($this->cities)
        ];
    }
}
