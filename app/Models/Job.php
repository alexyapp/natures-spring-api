<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use Sluggable;

    /**
     * 
     */
    protected $appends = [
        'location'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'island_group_id','province_id', 'city_id', 'user_id'
    ];

    /**
     * Get job poster
     * 
     * @return \App\Models\User
     */
    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get island group of job
     * 
     * @return \App\Models\IslandGroup
     */
    public function islandGroup()
    {
        return $this->belongsTo(IslandGroup::class);
    }

    /**
     * Get the province where this job is located.
     * 
     * @return \App\Models\Province
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get the city where this job is located.
     * 
     * @return \App\Models\City
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * 
     */
    public function getLocationAttribute()
    {
        return $this->city->name . ', ' . $this->city->province->name;
    }
}
