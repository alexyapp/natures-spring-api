<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class IslandGroup extends Model
{
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all provinces beloging to this island group
     * 
     * @return \App\Models\Province
     */
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    /**
     * Get all cities beloging to a province belonging to this island group
     * 
     * @return \App\Models\City
     */
    public function cities()
    {
        return $this->hasManyThrough(City::class, Province::class);
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
                'source' => 'name'
            ]
        ];
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
}
