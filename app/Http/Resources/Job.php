<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Job extends JsonResource
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
            'location' => $this->location,
            'city' => $this->city->name,
            'province' => $this->province->name,
            'island_group' => $this->islandGroup->name,
            'title' => $this->title,
            'short_description' => Str::limit(strip_tags($this->description), 30),
            'long_description' => strip_tags($this->description),
            'rich_text_description' => $this->description,
            'slug' => $this->slug,
            'poster' => $this->poster->name,
            'created_at' => Carbon::parse($this->created_at)->format('F d Y, g:i A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('F d Y, g:i A'),
        ];
    }
}
