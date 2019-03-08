<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Str;

class Event extends JsonResource
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
            'short_info' => Str::limit($this->info, 30),
            'long_info' => strip_tags($this->info),
            'rich_text_info' => $this->info,
            'slug' => $this->slug,
            'organizer' => new UserResource($this->organizer),
            'cover_image' => $this->cover_image,
            'created_at' => Carbon::parse($this->created_at)->format('F d, Y g:i A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('F d, Y g:i A'),
            'start_date' => Carbon::parse($this->start_date)->format('F d, Y g:i A'),
            'end_date' => Carbon::parse($this->end_date)->format('F d, Y g:i A'),
        ];
    }
}
